<?php
	require_once 'conexao_db.php';

	// Validação
	$nome = isset($_POST['txt_nome']) ? $_POST['txt_nome'] : '';
	$telefone = isset($_POST['txt_tel']) ? $_POST['txt_tel'] : '';

	if (empty($nome) || empty($telefone)) {
		echo @json_encode(array('status' => 1));
		exit;
	}

	// Conexão com o banco
	$conn = connect();
	if (!is_object($conn)) {
		echo @json_encode(array('status' => 2, 'erro' => $conn));
		exit;
	}

	$sql = "INSERT INTO telefones (nome_telefone, numero_telefone) 
			VALUES (:nome, :numero)";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':numero', $telefone);

	if ($stmt->execute()) {
		echo @json_encode(array('status' => 4));
	} else {
		echo @json_encode(array('status' => 3));
	}

	// Destruir a conexão
	unset($conn);

<?php
	// Importação de scripts
	require_once 'conexao_db.php';

	// Pegando dados sem validar
	$id_telefone = $_POST['id_telefone'];

	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "SELECT * FROM telefones WHERE id_telefone = :id_telefone";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id_telefone', $id_telefone);
	
	if ($stmt->execute()) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode(array('erro' => FALSE, $row));
	} else {
		echo json_encode(array('erro' => TRUE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);
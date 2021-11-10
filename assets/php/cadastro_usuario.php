<?php
	require_once 'conexao_db.php';

	// Validação
	$nome = isset($_POST['txt_nome']) ? $_POST['txt_nome'] : '';
	$usuario = isset($_POST['txt_usuario']) ? $_POST['txt_usuario'] : '';
	$tipo = isset($_POST['opt_tipo']) ? $_POST['opt_tipo'] : '';
	$senha = isset($_POST['txt_senha']) ? $_POST['txt_senha'] : '';
	$confirm_senha = isset($_POST['txt_confirmar_senha']) ? $_POST['txt_confirmar_senha'] : '';

	if (empty($nome) || empty($usuario) || empty($tipo) || empty($senha) || empty($confirm_senha)) {
		echo @json_encode(array('status' => 1));
		exit;
	}

	/*if ($tipo <> 1 || $tipo <> 2) {
		echo @json_encode(array('status' => 1));
	}*/

	if ($senha == $confirm_senha) {
		$senhafinal = $senha;
	} else {
		echo @json_encode(array('status' => 2));
	}

	// Conexão com o banco
	$conn = connect();
	if (!is_object($conn)) {
		echo @json_encode(array('status' => 3, 'erro' => $conn));
		exit;
	}

	$sql = "INSERT INTO usuarios (usuario, senha_usuario, nome_usuario, tipo_usuario) 
			VALUES (:usuario, :senha, :nome, :tipo)";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':senha', $senhafinal);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':tipo', $tipo);

	if ($stmt->execute()) {
		echo @json_encode(array('status' => 5));
	} else {
		echo @json_encode(array('status' => 4));
	}

	// Destruir a conexão
	unset($conn);

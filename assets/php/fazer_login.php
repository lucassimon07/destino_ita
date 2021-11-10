<?php
	
	require_once 'conexao_db.php';

	// Validação dos Dados
	$usuario = isset($_POST['txt_usuario']) ? $_POST['txt_usuario'] : '';
	$senha = isset($_POST['txt_senha']) ? $_POST['txt_senha'] : '';

	if (empty($usuario) || empty($senha)) {
		echo json_encode(['login' => FALSE]);
		exit;
	}

	// Tentando conectar ao banco
	$conn = connect();

	// Testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(['login' => FALSE, 'erro' => $conn]);
		exit;
	}

	$sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND senha_usuario=:senha";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':senha', $senha);
	if ($stmt->execute()) {
		if ($stmt->rowCount() == 1) {
			// Fazendo o fetch
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Sessão
			session_start();
			$_SESSION['logged'] = TRUE;
			$_SESSION['id_usuario'] = $row['id_usuarios'];
			$_SESSION['nome_usuario'] = $row['nome_usuario'];
			$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

			// Retorno de login com sucesso
			echo json_encode(['login' => TRUE]);
		} else {
			echo json_encode(['login' => FALSE]);
		}
	}
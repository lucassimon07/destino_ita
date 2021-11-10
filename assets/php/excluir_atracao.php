<?php
	// Importação de scripts
	require_once 'conexao_db.php';

	// Validação dos dados
	$id_atracao = isset($_POST['id_atracao']) ? $_POST['id_atracao'] : '';
	if (empty($id_atracao)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 1));
		exit;
	}

	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "DELETE FROM atracoes WHERE id_atracao = :id_atracao";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id_atracao', $id_atracao);
	
	if ($stmt->execute()) {
		echo json_encode(array('erro' => FALSE));
	} else {
		echo json_encode(array('erro' => TRUE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);
<?php
  require_once 'conexao_db.php';

  // Validação
  $id_telefone = isset($_POST['txt_id_telefone']) ? $_POST['txt_id_telefone'] : ''; 
  $nome = isset($_POST['txt_nome']) ? $_POST['txt_nome'] : '';
  $telefone = isset($_POST['txt_tel']) ? $_POST['txt_tel'] : '';


  if (empty($nome) || empty($telefone) ) {
    echo json_encode(array('status' => 1));
    exit;
  }


  // Conexão com o banco
  $conn = connect();
  if (!is_object($conn)) {
    echo json_encode(array('status' => 3, 'erro' => $conn));
    exit;
  }

  $sql = "UPDATE telefones SET nome_telefone = :nome,
   numero_telefone = :numero
 WHERE id_telefone = :id_telefone";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_telefone', $id_telefone);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':numero', $telefone);


  if ($stmt->execute()) {
    echo json_encode(array('status' => 5));
  } else {
    echo json_encode(array('status' => 4));
  }

  // Destruir a conexão
  unset($conn);

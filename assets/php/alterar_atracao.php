<?php
  require_once 'conexao_db.php';
  require_once 'upload_imagem.php';

  // Validação
  $id_atracao = isset($_POST['txt_id_atracao']) ? $_POST['txt_id_atracao'] : ''; 
  $titulo = isset($_POST['txt_titulo']) ? $_POST['txt_titulo'] : '';
  $descricao = isset($_POST['txt_desc']) ? $_POST['txt_desc'] : '';
  $categoria = isset($_POST['select_cat']) ? $_POST['select_cat'] : '';
  $telefone = isset($_POST['txt_telefone']) ? $_POST['txt_telefone'] : '';
  $endereco = isset($_POST['txt_endereco']) ? $_POST['txt_endereco'] : '';
  $funcionamento = isset($_POST['txt_funcionamento']) ? $_POST['txt_funcionamento'] : '';
    


  if (empty($titulo) || empty($descricao) || empty($categoria) || empty($endereco)) {
    echo json_encode(array('status' => 1));
    exit;
  }

  // Validação do envio da imagem

  if ($_FILES['file_img']['size'] == 0) {
    echo json_encode(array('status' => 1));
    exit;
  }

  if ($_FILES['file_img']['size'] > 0) {
    $enviarImagem = enviarImagem($_FILES['file_img'], 5, '../imagens/uploads');

    // Se o status retornado for 1, então a imagem foi enviada com sucesso
    if ($enviarImagem['status'] == 1) {
      $imagem = $enviarImagem['imagem']; // Pegando o nome da imagem transferida para o servidor
    } else {
      echo json_encode(array('erro' => TRUE, 'tipo' => 1, 'msg' => $enviarImagem['erro']));
      exit;
    }
  } else {
    $imagem = '';
  }


  // Conexão com o banco
  $conn = connect();
  if (!is_object($conn)) {
    echo json_encode(array('status' => 3, 'erro' => $conn));
    exit;
  }

  $sql = "UPDATE atracoes SET nome_atracao = :titulo,
   descricao_atracao = :descricao,
  categoria_atracao =  :categoria,
  telefone_atracao = :telefone,
  localizacao_atracao = :endereco,
  imagem_atracao = :imagem,
  horario_funcionamento_atracao = :funcionamento 
 WHERE id_atracao = :id_atracao";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_atracao', $id_atracao);
  $stmt->bindParam(':titulo', $titulo);
  $stmt->bindParam(':descricao', $descricao);
  $stmt->bindParam(':categoria', $categoria);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':endereco', $endereco);
  $stmt->bindParam(':imagem', $imagem);
  $stmt->bindParam(':funcionamento', $funcionamento);



  if ($stmt->execute()) {
    echo json_encode(array('status' => 5));
  } else {
    echo json_encode(array('status' => 4));
  }

  // Destruir a conexão
  unset($conn);

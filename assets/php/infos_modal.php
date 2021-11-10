<?php
  // Importação de scripts
  require_once 'conexao_db.php';
$id_atracao = isset($_POST['id_atracao']) ? $_POST['id_atracao'] : '';

  // Conexão com o banco
  $conn = connect();
  
  // Validação da conexão, testando se a $conn é um objeto com a conexão dentro
  if (!is_object($conn)) {
    echo "<h2>Houve um problema de conexão com o banco: {$conn}</h2>";
    exit;
  }

 // SQL 
  $sql = "SELECT * FROM atracoes WHERE id_atracao = :id_atracao";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_atracao', $id_atracao);

  if ($stmt->execute()) {
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs as $row) {
      echo "

       <h2> <strong>{$row['nome_atracao']}</strong></h2>
        ";
        if (!empty($row['imagem_atracao'])) {
              echo "<a href='assets/imagens/uploads/{$row['imagem_atracao']}' target='_blank'><img src='assets/imagens/uploads/{$row['imagem_atracao']}'></img></a>";
            }
          echo "<hr></td>
        <h2><strong>Descrição</strong></h2>
        <h3>{$row['descricao_atracao']}</h3>
        <hr>
         <h2><strong>Telefone:</strong></h2>
        <h3>{$row['telefone_atracao']}</h3>
        <hr>
         <h2><strong>Endereço:</strong></h2>
        <h3>{$row['localizacao_atracao']}</h3>
        <hr>
         <h2><strong>Funcionamento:</strong></h2>
        <h3>{$row['horario_funcionamento_atracao']}</h3>
        

      ";
    }
  } 
    
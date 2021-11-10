<?php
  // Importação de scripts
  require_once 'conexao_db.php';


  // Conexão com o banco
  $conn = connect();
  
  // Validação da conexão, testando se a $conn é um objeto com a conexão dentro
  if (!is_object($conn)) {
    echo "<tr><td colspan='7'>Houve um problema de conexão com o banco: {$conn}</td></tr>";
    exit;
  }

  // SQL e bindings
  $sql = "SELECT * FROM atracoes";
  $stmt = $conn->prepare($sql);

  if ($stmt->execute()) {
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs as $row) {
      echo "<tr>
          <td>{$row['id_atracao']}</td>
          <td>" . mb_strimwidth($row['nome_atracao'], 0, 25, '...') . "</td>
          <td>" . mb_strimwidth($row['descricao_atracao'], 0, 50, '...') . "</td>
          <td>" . mb_strimwidth($row['categoria_atracao'], 0, 50, '...') . "</td>
           <td>" . mb_strimwidth($row['telefone_atracao'], 0, 50, '...') . "</td>
            <td>" . mb_strimwidth($row['localizacao_atracao'], 0, 10, '...') . "</td>
          <td>"; 
            if (!empty($row['imagem_atracao'])) {
              echo "<a href='../imagens/uploads/{$row['imagem_atracao']}' target='_blank'>Imagem</a>";
            }
          echo "</td>
           <td>" . mb_strimwidth($row['horario_funcionamento_atracao'], 0, 20, '...') . "</td>";
            echo "<td><button onclick='carregar_atracao({$row['id_atracao']})'>Alterar</button>
                    <button onclick='excluir({$row['id_atracao']})'>Excluir</button></td>";
        "</tr>";
    }
    
    $total = $stmt->rowCount(); // Obtendo o total de registros contidos no fetch
    echo "<tr><td colspan='10'><strong>Total de atrações cadastradas: {$total}</strong></td></tr>";
  } else {
    echo "<tr><td colspan='10'>Houve um problema na execução do SQL.</td></tr>";
  }
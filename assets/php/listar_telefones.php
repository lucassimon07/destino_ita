<?php
  // Importação de scripts
  require_once 'conexao_db.php';


  // Conexão com o banco
  $conn = connect();
  
  // Validação da conexão, testando se a $conn é um objeto com a conexão dentro
  if (!is_object($conn)) {
    echo "<tr><td colspan='4  '>Houve um problema de conexão com o banco: {$conn}</td></tr>";
    exit;
  }

  // SQL e bindings
  $sql = "SELECT * FROM telefones";
  $stmt = $conn->prepare($sql);

  if ($stmt->execute()) {
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs as $row) {
      echo "<tr>
          <td>{$row['id_telefone']}</td>
          <td>" . mb_strimwidth($row['nome_telefone'], 0, 25, '...') . "</td>
          <td>" . mb_strimwidth($row['numero_telefone'], 0, 50, '...') . "</td>";
          echo "<td><button onclick='carregar_telefone({$row['id_telefone']})'>Alterar</button>
                    <button onclick='excluir({$row['id_telefone']})'>Excluir</button></td>";
    }
    
    $total = $stmt->rowCount(); // Obtendo o total de registros contidos no fetch
    echo "<tr><td colspan='4'><strong>Total de telefones cadastrados: {$total}</strong></td></tr>";
  } else {
    echo "<tr><td colspan='4'>Houve um problema na execução do SQL.</td></tr>";
  }
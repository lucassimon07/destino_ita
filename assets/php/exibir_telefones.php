<?php
	// Importação de scripts
	require_once 'conexao_db.php';

	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo "Houve um problema de conexão com o banco: {$conn}";
		exit;
	}
	// SQL e bindings
	$sql = "SELECT * FROM telefones";
	$stmt = $conn->prepare($sql);

	if ($stmt->execute()) {

		// Verifica se o total de registros é maior que 0, se for, imprime as notícias através de um foreach, senão imprime uma msg
		if ($stmt->rowCount() > 0) {
			$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rs as $row) {
				echo "<div id='nome_tel'>
						<h2>{$row['nome_telefone']}</h2>
					  </div>
					  <div>
					  	<h3>{$row['numero_telefone']}</h3>
					  </div>
					  <hr>	
				";
			}
		} else {
			echo "Não existem telefones cadastradas no banco de dados.";
		}
	} else {
		echo "Houve um problema na execução do SQL.";
	}

	// Destruir conexão com o BD
	unset($conn);
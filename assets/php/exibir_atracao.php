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

	$categoria = $_POST['categoria'];

	// SQL e bindings
	$sql = "SELECT * FROM atracoes WHERE categoria_atracao = :categoria";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':categoria', $categoria);

	if ($stmt->execute()) {

		// Verifica se o total de registros é maior que 0, se for, imprime as notícias através de um foreach, senão imprime uma msg
		if ($stmt->rowCount() > 0) {
			$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

			echo "<div class='container'>
			<div class='grid cs-style-4'>";

			foreach ($rs as $row) {
				echo "
				
				<li>
					<figure>
						<div><img src='assets/imagens/uploads/{$row['imagem_atracao']}'></div>
						<figcaption>
							<h3>" . mb_strimwidth($row['nome_atracao'], 0, 25, '...') . "</h3>
							<h4>" . mb_strimwidth($row['descricao_atracao'], 0, 30, '...') . "</h4>
							<button id='btn_info' name='btn_info' onclick='modal({$row['id_atracao']})'>Mais informações...</button>";
							/*echo "<script>$('#btn_info').css('pointer-events', 'none');</script>";*/
						echo "</figcaption>
					</figure>
				</li>
			";
			}
			echo "</div>
				</div>";
		} else {
			echo "Não existem atrações cadastradas nesta aba.";
		}
	} else {
		echo "Houve um problema na execução do SQL.";
	}

	// Destruir conexão com o BD
	unset($conn);
<?php
	session_start();
	if (!isset($_SESSION['logged']) || $_SESSION['logged'] != TRUE) {
		header('LOCATION: login.php');
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Página do Administrador</title>
	<!-- CDN BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/pagina_adm.css">
</head>
<body>
	
	<section class="form-26-1">
         <div class="form-26-mian">
				<div class="layer">
				<center><div class="botoes">
					<?php if ($_SESSION['tipo_usuario'] == 2) {
						echo "<button class='btn btn-primary btn-lg' onclick='redireciona_usuarios()''>Cadastrar Usuário</button><br>";
					} ?>
					<button class="btn btn-primary btn-lg" onclick="redireciona_atracao()">Controle de Atrações</button><br>
					<button class="btn btn-primary btn-lg" onclick="redireciona_telefones()">Controle de Telefones</button><br>
					<button class="btn btn-primary btn-lg" onclick="exibir_modal()">Sair do sistema</button><br>
				</div></center>
			</div>
	</div>
</section>

    <div id="modal_sair" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><strong>Atenção</strong></h5>
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
            <p  id="modal_corpo"> Tem cereteza que deseja sair do sistema? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-secondary" onclick="logout()">Sim</button>
              </div>
            </div>
          </div>
        </div>




	<!-- CDNS JS BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- redirecionarmentos -->
	<script type="text/javascript">
		function redireciona_usuarios() {
			window.location.href = 'cadastrar_usuarios.php';
		}
		function redireciona_atracao() {
			window.location.href = 'cadastrar_atracao.php';
		}
		function redireciona_telefones() {
			window.location.href = 'cadastrar_telefones.php';
		}
		function logout() {
        window.location.href = 'assets/php/logout.php';
      }
      function exibir_modal() {
      	$('#modal_sair').modal('show');
      }
	</script>
</body>
</html>
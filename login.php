


<!DOCTYPE html>
	<head>
		<title>Login administrador</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8" /> 
		<link rel="stylesheet" href="assets/css/login.css" type="text/css" media="all" /><!--CSS -->
	</head>
	<body>
		<section class="form-26">
			<div class="form-26-mian"><!-- FOTO FUNDO -->
				<div class="layer"> <!-- COR EM CIMA DA FOTO DE FUNDO -->
				<div class="wrapper">
					<div class="form-inner-cont">
						<div class="forms-26-info">
							<h2>Login</h2>
							<p>Entre com sua conta administrador e realize alterações no site.</p>
						</div>
							<div class="form-right-inf"> <!-- INPUTS DO FORMULÁRIO --> 
							<form id="form_login" name="form_login" class="signin-form">	
								<div class="forms-gds">
									<!-- INPUT USUÁRIO -->
									<div  class="form-input">
										<input type="text" id="txt_usuario" name="txt_usuario" placeholder="Usuário" required />
									</div>
									<!-- INPUT SENHA -->
									<div  class="form-input">
										<input type="password" id="txt_senha" name="txt_senha" placeholder="Senha" required />
									</div>
									<div  class="form-input">
										<button class="btn" id="btn_login" name="btn_login" onclick="enviarDados()">Login</button>
									</div>
								</div>
							</form>

						</div>
						<div class="copyright text-center">
						<p>Copyright © Todos os direitos reservados</p>
						</div>
					</div>

				</div>
				</div>
			</div>
		</section>

	
	<!-- IMPORTAÇÃO BOOTSTRAP -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- IMPORTAÇÃO AJAX -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<!-- AJAX -->
	<script type="text/javascript">
	  $(document).ready(function() {
	    $('#form_login').submit(function() { return false; });
	  });

	  function enviarDados() {
	    $.ajax({
	      type: 'POST',
	      dataType: 'JSON',
	      data: {
	        'txt_usuario': $('#txt_usuario').val(),
	        'txt_senha': $('#txt_senha').val()
	      },
	      url: 'assets/php/fazer_login.php',
	      success: function(resposta) {
	        if (resposta.login == true) {
	          window.location.href = 'pagina_adm.php';
	        } else if (resposta.login == false && resposta.hasOwnProperty('erro')) {
	         alert(resposta.erro);
	        } else {
	          alert('Usuário ou Senha inválidos. Verifique.');
	        }
	      } 
	    }).fail(function(jqXHR, textStatus, error) {
	      alert(textStatus + ' ' + error);
	    });
	  }
</script>

</html>
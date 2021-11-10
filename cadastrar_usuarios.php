<?php
	session_start();
	if (!isset($_SESSION['logged']) || $_SESSION['logged'] != TRUE) {
		header('LOCATION: login.php');
	}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Cadastro de novos usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
	 <link rel="stylesheet" href="assets/css/cadastrar_usuario.css" type="text/css" media="all" /><!-- Style-CSS -->
</head>
<body>
   <!-- /form-26-section -->
   <section class="form-26-1">
         <div class="form-26-mian">
				<div class="layer">
			<div class="wrapper">
			<div class="form-inner-cont">
					<div class="forms-26-info">
						<h2>Cadastrar</h2>
                    </div>
					<div class="form-right-inf"> 
							<form action="#" method="post" class="signin-form" id="form_cadastro" name="form_cadastro">	
							 <div class="forms-gds">
								<!-- PRIMEIRO NOME -->
								 <div  class="form-input">
									<input type="text" id="txt_nome" name="txt_nome" placeholder="Nome" required />
								</div>
								
								<!-- USUÁRIO -->
								<div  class="form-input">
									<input type="text" id="txt_usuario" name="txt_usuario" placeholder="Usuário" required />
								</div>
								<!-- TIPO -->
								<div  class="form-input">
										<input type="radio" name="opt_tipo" value="1" checked /><label class="tipo">Administrador</label><br>
										<input type="radio" name="opt_tipo" value="2" /><label class="tipo">Administrador Master</label><br>
										
									</div>
								<!-- SENHA -->
								<div  class="form-input">
									<input type="password" id="txt_senha" name="txt_senha" placeholder="Senha" required />
								</div>
								<!-- CONFIRMAR SENHA -->
								<div  class="form-input">
									<input type="password" id="txt_confirmar_senha" name="txt_confirmar_senha" placeholder="Confirmar Senha" required />
								</div>
								<div  class="form-input"><button class="btn" onclick="cadastrar()">Cadastrar</button></div>
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

</body>


	<!-- IMPORTAÇÃO BOOTSTRAP -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- IMPORTAÇÃO AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


<!-- AJAX -->
<script type="text/javascript">
	  $(document).ready(function() {
	    $('#form_cadastro').submit(function() { return false; });
	  });


	function cadastrar() {
	      $.ajax({
	        type: 'POST',
	        url: 'assets/php/cadastro_usuario.php',
	        dataType: 'JSON',
	        data: new FormData($('#form_cadastro')[0]),
	        processData: false,
	        contentType: false,
	        cache: false,
	        success: function(retorno) {
	          switch (retorno.status) {
	            case 1:
	              alert('Por favor preencha todos os campos obrigatórios.');
	              break;
	            case 2:
	            alert('As senhas não conferem.');
	            	break;
	            case 3:
	              alert(retorno.erro);
	              break;
	            case 4:
	              alert('Houve um problema, não foi possível cadastrar o usuário.');
	              break;
	            case 5:
	              alert('Usuário cadastrado com sucesso.');
	              // $('#formCadastro').trigger('reset');
	              $('#form_cadastro')[0].reset();
	              break;
	          }
	        }
	      }).fail(function(jqXHR, textStatus, error) {
	        alert(textStatus + ' ' + error);
	      });
	    }
</script>
</html>
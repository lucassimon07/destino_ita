<?php
  session_start();
  if (!isset($_SESSION['logged']) || $_SESSION['logged'] != TRUE) {
    header('LOCATION: login.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar telefones úteis</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/cadastrar_telefone.css">
</head>
<body>

	

	<div class="wrapper">
		<h2>Listagem de Telefones</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody id="tbody_telefones">

              </tbody>
            </table>
          </div>

		<form id="form_cadastro_telefone">
			<h2>Cadastro de Telefones</h2>
	        <input type="hidden" name="txt_id_telefone" id="txt_id_telefone">
	          <!-- TÍTULO -->
	          <div class="form-group">
	            <label for="">Título do telefone</label>
	            <input type="text" class="form-control form-control-lg" id="txt_nome" name="txt_nome">
	          </div>
	          <!-- DESCRIÇÃO -->
	          <div class="form-group">
	            <label for="">Telefone</label>
	            <input type="number" class="form-control form-control-lg" id="txt_tel" name="txt_tel">
	            <button class="btn btn-primary" onclick="verificar_acao()" id="btn_cadastrar">Cadastrar</button>
	          </div>
        </form>
	</div>

	<!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {
      $('#form_cadastro_telefone').submit(function() { return false; });

      listar();
    });

    function verificar_acao() {
      if (!$('#txt_id_telefone').val()) {
        cadastrar();
      } else {
        alterar_telefone();
      }
    }

	function cadastrar() {
        $.ajax({
          type: 'POST',
          url: 'assets/php/cadastro_telefones.php',
          dataType: 'JSON',
          data: new FormData($('#form_cadastro_telefone')[0]),
          processData: false,
          contentType: false,
          cache: false,
          success: function(retorno) {
            switch (retorno.status) {
              case 1:
                alert('Por favor preencha todos os campos obrigatórios.');
                break;
              case 2:
                alert(retorno.erro);
                break;
              case 3:
                alert('Houve um problema, não foi possível cadastrar o telefone.');
                break;
              case 4:
                alert('Telefone cadastrado com sucesso.');
                // $('#formCadastro').trigger('reset');
                $('#form_cadastro_telefone')[0].reset();
                listar();
                break;
            }
          }
        }).fail(function(jqXHR, textStatus, error) {
          alert(textStatus + ' ' + error);
        });
      }

       function listar() {
        $.ajax({
          type: 'POST',
          url: 'assets/php/listar_telefones.php',
          dataType: 'HTML',
          data: {
          },
          success: function(retorno) {
            $('#tbody_telefones').html(retorno);
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

      function carregar_telefone(id) {
          $.ajax({
            type: 'POST',
            url: 'assets/php/carregar_telefone.php',
            dataType: 'JSON',
            data: {
              'id_telefone': id
            },
            success: function(retorno) {
              if (retorno.erro == false) {
                $('#txt_id_telefone').val(retorno[0].id_telefone);
                $('#txt_nome').val(retorno[0].nome_telefone);
                $('#txt_tel').val(retorno[0].numero_telefone);
                $('#btn_cadastrar').text('Atualizar');
              } else if (retorno.tipo == 2) {
                alert(retorno.msg);
              } else if (retorno.tipo == 3) {
                alert(retorno.msg);
              }
            }
          }).fail(function(jqXHR, textStatus, erro) {
            alert(textStatus + ' ' + erro);
          });
        }

        function excluir(id) {
        $.ajax({
          type: 'POST',
          url: 'assets/php/excluir_telefone.php',
          dataType: 'JSON',
          data: {
            'id_telefone': id
          },
          success: function(retorno) {
      if (retorno.erro == false) {
              alert('Telefone excluído com sucesso.');
            } else if (retorno.tipo == 1) {
              alert('Houve um problema com o id do telefone a ser excluída.');
            } else if (retorno.tipo == 2) {
              alert(retorno.msg);
            } else if (retorno.tipo == 3) {
              alert(retorno.msg);
            }
            listar();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

       function alterar_telefone() {
        $.ajax({
          type: 'POST',
          url: 'assets/php/alterar_telefone.php',
          dataType: 'JSON',
          data: new FormData($('#form_cadastro_telefone')[0]),
          processData: false,
          contentType: false,
          cache: false,           
          success: function(retorno) {
            if (retorno.status == 5) {
             alert('Telefone atualizada com sucesso.');
            } else if (retorno.tipo == 1) {
              alert('Por favor preencha todos os campos.');
            } else if (retorno.tipo == 2) {
              alert(retorno.msg);
            } else if (retorno.tipo == 3) {
              alert(retorno.msg);
            }
            
            $('#btn_cadastrar').html('Cadastrar');
            $('#form_cadastro_telefone')[0].reset();
            listar();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }
      </script>
</body>
</html>
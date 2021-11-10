<?php
  session_start();
  if (!isset($_SESSION['logged']) || $_SESSION['logged'] != TRUE) {
    header('LOCATION: login.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Atração</title>
  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/cadastrar_atracao.css">
</head>
<body>
        <div class="wrapper">
          <h2>Listagem de Atrações</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th>Telefone</th>
                  <th>Endereço</th>
                  <th>Imagem</th>
                  <th>Funcionamento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody id="tbody_atracoes">

              </tbody>
            </table>
          </div>


            <h2>Cadastro de Atração</h2>
            <!-- FORMULÁRIO -->
            <form id="form_cadastro_atracao">
              <!-- <input type="hidden" name="txt_id_suario" value="<?php //echo $_SESSION['id']?>">-->
              <input type="hidden" name="txt_id_atracao" id="txt_id_atracao"> 
              <!-- TÍTULO -->
              <div class="form-group">
                <label for="">Título</label>
                <input type="text" class="form-control form-control-lg" id="txt_titulo" name="txt_titulo" required>
              </div>
              <!-- DESCRIÇÃO -->
              <div class="form-group">
                <label for="">Descrição</label>
                <textarea class="form-control form-control-lg" id="txt_desc" name="txt_desc" required rows="3"></textarea>
              </div>
              <!-- CATEGORIA -->
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                </div>
                  <select class="custom-select" name="select_cat" id="select_cat">
                    <option value="atracoes_gratuitas" selected>Atrações Gratuitas</option> 
                    <option value="atracoes_pagas">Atrações Pagas</option>
                    <option value="passeios">Passeios</option>
                    <option value="hospedagem">Hospedagem</option>
                    <option value="alimentacao">Alimentação</option>
                    <option value="museus">Museus</option>
                    <option value="comercio">Comércio</option>
                    <option value="telefones_uteis">Telefones Úteis</option>
                  </select>
              <!-- IMAGEM -->    
              </div>
              <div class="form-group">
                <label>Imagem</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file_img" name="file_img" required>
                  <label class="custom-file-label" for="customFile">Escolha o arquivo</label>
                </div>
              </div>
              <!-- TELEFONE -->
              <div class="form-group">
                <label for="">Telefone</label>
                <input type="number" class="form-control" id="txt_telefone" name="txt_telefone" >
              </div>
              <!-- LOCALIZAÇÃO -->
               <div class="form-group">
                <label for="">Endereço</label>
                <input type="text" class="form-control" id="txt_endereco" required name="txt_endereco">
              </div>
              <!-- FUNCIONAMENTO -->
               <div class="form-group">
                <label for="">Horário de funcionamento</label>
                <input type="text" class="form-control" id="txt_funcionamento" name="txt_funcionamento">
              </div>
              <button class="btn btn-primary" onclick="verificar_acao()" id="btn_cadastrar">Cadastrar</button>
            </form>
          </div> <!-- wrapper -->

                      <!-- modal -->






      <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#form_cadastro_atracao').submit(function() { return false; });

      listar();
    });

    function verificar_acao() {
        if (!$('#txt_id_atracao').val()) {
          cadastrar();
        } else {
          alterar_atracao();
        }
      }

  function cadastrar() {
        $.ajax({
          type: 'POST',
          url: 'assets/php/cadastro_atracao.php',
          dataType: 'JSON',
          data: new FormData($('#form_cadastro_atracao')[0]),
          processData: false,
          contentType: false,
          cache: false,
          success: function(retorno) {
            switch (retorno.status) {
              case 1:
                alert('Por favor preencha todos os campos obrigatórios ou da maneira correta.');
                break;
              case 2:
              alert('As senhas não conferem.');
                break;
              case 3:
                alert(retorno.erro);
                break;
              case 4:
                alert('Houve um problema, não foi possível cadastrar a atração.');
                break;
              case 5:
                alert('Atração cadastrado com sucesso.');
                // $('#formCadastro').trigger('reset');
                $('#form_cadastro_atracao')[0].reset();

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
          url: 'assets/php/listar_atracoes.php',
          dataType: 'HTML',
          data: {
          },
          success: function(retorno) {
            $('#tbody_atracoes').html(retorno);
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

        function excluir(id) {
        $.ajax({
          type: 'POST',
          url: 'assets/php/excluir_atracao.php',
          dataType: 'JSON',
          data: {
            'id_atracao': id
          },
          success: function(retorno) {
      if (retorno.erro == false) {
              alert('Atração excluída com sucesso.');
            } else if (retorno.tipo == 1) {
              alert('Houve um problema com o id da atração a ser excluída.');
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


        function carregar_atracao(id) {
          $.ajax({
            type: 'POST',
            url: 'assets/php/carregar_atracao.php',
            dataType: 'JSON',
            data: {
              'id_atracao': id
            },
            success: function(retorno) {
              if (retorno.erro == false) {
                $('#txt_id_atracao').val(retorno[0].id_atracao);
                $('#txt_titulo').val(retorno[0].nome_atracao);
                $('#txt_desc').val(retorno[0].descricao_atracao);
                $('#txt_telefone').val(retorno[0].telefone_atracao);
                $('#txt_endereco').val(retorno[0].localizacao_atracao);
                $('#txt_funcionamento').val(retorno[0].horario_funcionamento_atracao);
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

        function alterar_atracao() {
        $.ajax({
          type: 'POST',
          url: 'assets/php/alterar_atracao.php',
          dataType: 'JSON',
          data: new FormData($('#form_cadastro_atracao')[0]),
          processData: false,
          contentType: false,
          cache: false,           
          success: function(retorno) {
            if (retorno.status == 5) {
             alert('Atração atualizada com sucesso.');
            } else if (retorno.tipo == 1) {
              alert('Por favor preencha todos os campos.');
            } else if (retorno.tipo == 2) {
              alert(retorno.msg);
            } else if (retorno.tipo == 3) {
              alert(retorno.msg);
            }
            
            $('#btn_cadastrar').html('Cadastrar');
            $('#form_cadastro_atracao')[0].reset();
            listar();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }
</script>
</body>
</html>
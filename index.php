<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Destino Itá</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
    <link href="vendor/css/bootstrap.css" rel="stylesheet" />
    <link href="vendor/css/font-awesome.css" rel="stylesheet" />
    <link href="vendor/css/slick.css" rel="stylesheet" />
    <link href="vendor/css/slick-theme.css" rel="stylesheet" />
    <link href="vendor/css/odometer-theme-default.css" rel="stylesheet" />
    <link href="vendor/css/main.css" rel="stylesheet" />

<!--     <link rel="shortcut icon" href="../favicon.ico"> --> 
    <link rel="stylesheet" type="text/css" href="vendor/css/default.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/component.css" />
    <script src="vendor/js/modernizr.custom.js"></script>



        <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/tabs.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/tabstyles.css" />
</head>
<body>

    <!-- --------------------------------------------- -->
    <!-- /CABEÇALHO -->
    <header>
        <!-- CONTAINER HEADER -->
        <div class="container">
            <!-- LOGO -->
            <div class="logo">
               <center> <a href="principal.php"><img src="assets/img/logo.png" alt=""/></a></center> 
                <style type="text/css"> 
                    .sticky-header img {
                    width: 10%;
                    height: 10%;

                    }
                    img {
                    width: 25%;
                    height: 25%;

                    }
                </style>
            </div>  <!-- /LOGO -->
            <!-- MENU -->
            <!-- /CONTAINER HEADER -->
    </header>

    <!-- SLIDER -->
    <div class="home-slider">
        <div class="home-slider--wrapper">
            <div>
                <div class="home-slider--wrapper__inner" style="background-image: url('assets/img/slider.jpg')">
                    <div class="container">

                    </div>
                </div>
            </div>
            <div>
                <div class="home-slider--wrapper__inner" style="background-image: url('assets/img/slider1.jpg')">
                    <div class="container">

                    </div>
                </div>
            </div>
            <div>
                <div class="home-slider--wrapper__inner" style="background-image: url('assets/img/slider2.jpeg')">
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
        <div class="home-slider--nav">
            <div class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            <div class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
        <div class="home-slider--anchor">
            <span><i class="fa fa-anchor" aria-hidden="true"></i></span>
        </div>
    </div>

    <svg class="hidden">
            <defs>
                <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
            </defs>
        </svg>
        <div class="container">
            <!-- Top Navigation -->
            
            <section> <!-- menu -->
                <div class="tabs tabs-style-linebox">
                    <nav>
                        <ul>
                            <li><a href="#section-linebox-1" onclick="exibir_atracoes_gratuitas('atracoes_gratuitas')"><span>ATRAÇÕES GRATUITAS</span></a></li>
                            <li><a href="#section-linebox-2" onclick="exibir_atracoes_pagas('atracoes_pagas')"><span>ATRAÇÕES PAGAS</span></a></li>
                            <li><a href="#section-linebox-3" onclick="exibir_passeios('passeios')"><span>PASSEIOS</span></a></li>
                            <li><a href="#section-linebox-4" onclick="exibir_hospedagem('hospedagem')"><span>HOSPEDAGEM</span></a></li>
                            <li><a href="#section-linebox-5" onclick="exibir_alimentacao('alimentacao')"><span>ALIMENTAÇÃO</span></a></li>
                            <li><a href="#section-linebox-6" onclick="exibir_museus('museus')"><span>MUSEUS</span></a></li>
                            <li><a href="#section-linebox-7" onclick="exibir_comercio('comercio')"><span>COMÉRCIO</span></a></li>
                            <li><a href="#section-linebox-8" onclick="exibir_telefones('telefones_uteis')"><span>TELEFONES ÚTEIS</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                       
                       
                        <section id="section-linebox-1">


                            
                        </section>
                   
                        <section id="section-linebox-2">
                            
                        </section>
                        <section id="section-linebox-3">
                            
                        </section>
                        <section id="section-linebox-4">
                            
                        </section>
                        <section id="section-linebox-5">
                            
                        </section>
                        <section id="section-linebox-6">
                            
                        </section>
                        <section id="section-linebox-7">
                            
                        </section>
                        <section id="section-linebox-8">
                            
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
            </div>
                    
            </section> <!-- /menu -->

            <!-- modal -->
    <div id="modal_infos" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><strong>Informações</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
            <p  id="modal_corpo"> </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

            
            
            
                
                
        <script src="js/cbpFWTabs.js"></script>
        <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
        </script>

    <!-- -------------------------------------------------------------------------- -->
    <!-- MAPA -->         
    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14184.911752498612!2d-52.348302165917936!3d-27.274733505493824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e36035a1e1db03%3A0xd33a657522c0648!2zSXTDoSwgU0MsIDg5NzYwLTAwMA!5e0!3m2!1spt-BR!2sbr!4v1557360057147!5m2!1spt-BR!2sbr" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    <style type="text/css">
        .mapa { margin-top: 0.5%; }
    </style>
    <!-- -------------------------------------------------------------------------- -->
    <!-- HTML PREVISAO DO TEMPO -->
    <a  class="weatherwidget-io" href="https://forecast7.com/pt/n27d26n52d33/ita/" data-label_1="ITÁ" data-label_2="De olho no tempo" data-theme="original" >ITÁ Clima</a></div>
    <!-- -------------------------------------------------------------------------- -->
    <!-- JAVASCRIPT PREVISAO DO TEMPO -->
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
    <img class="footer" src="assets/img/footer.jpg"> <!-- FOTO PRÉ FOOTER -->
    <style type= "">
        .footer { width: 100%; height: auto;}
    </style>
    <footer>
        <div class="container"> <!-- CONTAINER FOOTER -->
            <center><p><a target="_blank" href="">Copyright © Todos os direitos reservados.</a></p><center>
        </div> <!-- /CONTAINER FOOTER -->
    </footer>

    <script type="text/javascript">
        window.odometerOptions = {
        format: '(,ddd)',
        };
    </script>
    
    <!-- -------------------------------------------------------------------------------------------------------------- -->
    <!-- IMPORTAÇÕES JS, CSS, BOOTSRAP -->
    <script src="vendor/js/jquery-3.1.0.min.js"></script>
    <script src="vendor/js/jquery.easing.min.js"></script>
    <script src="vendor/js/tether.js"></script>
    <script src="vendor/js/bootstrap.js"></script>
    <script src="vendor/js/slick.js"></script>
    <script src="vendor/js/isotope.pkgd.min.js"></script>
    <script src="vendor/js/odometer.min.js"></script>
    <script src="vendor/js/main.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                
            });

            function modal(id) {
                $.ajax({
                      type: 'POST',
                      url: 'assets/php/infos_modal.php',
                      dataType: 'HTML',
                      data:{
                        'id_atracao': id
                      },
                      success: function(retorno) {
                         $('#modal_corpo').html(retorno );
                        $('#modal_infos').modal('show');     
                      }
                    }).fail(function(jqXHR, textStatus, error) {
                      alert(textStatus + ' ' + error);
                    });
                  }
            

            function exibir_atracoes_gratuitas(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-1').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_atracoes_pagas(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-2').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_passeios(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-3').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_hospedagem(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-4').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_alimentacao(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-5').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_museus(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-6').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }
            
            function exibir_comercio(categoria) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_atracao.php',
                    dataType: 'HTML',
                    data: {
                        'categoria': categoria
                    },
                    success: function(retorno) {
                        $('#section-linebox-7').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }

            function exibir_telefones() {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/exibir_telefones.php',
                    dataType: 'HTML',
                    success: function(retorno) {
                        $('#section-linebox-8').html(retorno);
                    }
                }).fail(function(jqXHR, textStatus, erro) {
                  alert(textStatus + ' ' + erro);
                });
            }
            
        </script>
</body>
</html>

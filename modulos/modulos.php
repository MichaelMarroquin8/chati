<?php
session_start();
include('../iniciosesion/funciones.php');
include("conex/conn.php");
include("hora/fechora.php");

include("vsesion/sesion.php");

include("habilitar/habimodul.php");

if (isset($_SESSION['privilegio_nombre'])) {
?>
  <!DOCTYPE html>
  <html lang="en" class="no-js">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chati</title>
    <link rel="shortcut icon" href="imagenes/favicon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cajaestilo.css">

    <script src="librerias/code/highcharts.js"></script>
    <script src="librerias/code/modules/exporting.js"></script>
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/anima.css" />
    <link rel="stylesheet" type="text/css" href="css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="css/barradd.css" />
    <link rel="stylesheet" type="text/css" href="css/load.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/listatable.css">

    <link rel="stylesheet" type="text/css" href="css/plus.css">

    <link rel="stylesheet" type="text/css" href="css/haldol8.css" />
    <link rel="stylesheet" type="text/css" href="css/letra.css" />

    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />

    <script src="pagjs/pag.js"></script>



    <style>
      body {
        background-color: #ffffff;
      }
    </style>
  </head>

  <body>

    <div id="contenedor_carga">
      <div id="carga"></div>
    </div>

    <div class="home_content">


      <?php
      include("menu/lateral.php");
      ?>


      <?php
      include("bienvenida/usuario.php");
      ?>


      <!-- MÓDULOS -->
      <div class="text">
        <div class="margen">

          <?php
          if ($perfilem == 'usuario') {
          ?>



            <p>
              <font color="" style="font-size:1.5em;padding:10px;"><b>Habla con una empresa </b></font><br>
            </p>

            <div class="form-group">
              <input type="text" style="border-radius:12px;" name="search_boxact" id="search_boxact" class="form-control" placeholder="Busca nombres, servicios y productos" autocomplete="off" />
            </div>

            <br>
            <p>
              <font color="" style="font-size:1.3em;padding:10px;">Filtra por sectores de industria</font><br>
            </p>

            <br><br>
            <p>
              <font color="" style="font-size:1.3em;padding:10px;"><b>Empresas</b></font><br>
            </p>
            <div class="tabs tabs-style-linebox">
              <nav>
                <ul>
                  <li><a href="#section-linebox-1"><span>Destacadas</span></a></li>
                  <li><a href="#section-linebox-2"><span>Todas</span></a></li>
                  <br>
                  </span></a></li>
                </ul>
              </nav>
              <br>
              <nav>
                <ul>
                  <?php
                  include("servicios/filtros.php");
                  ?>
                </ul>
              </nav>

              <div class="content-wrap">
                <section id="section-linebox-1">
                  <br>
                  <div class="table-responsive" id="dynamic_contentact"></div>
                  <script>
                    $(document).ready(function() {

                      load_data(1);

                      function load_data(page, query = '') {
                        $.ajax({
                          url: "destacados.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_contentact').html(data);
                          }
                        });
                      }

                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });

                    });
                  </script>
                </section>
                <section id="section-linebox-2">
                  <br>
                  <div class="table-responsive" id="dynamic_contentactw"></div>
                  <script>
                    $(document).ready(function() {

                      load_data(1);

                      function load_data(page, query = '') {
                        $.ajax({
                          url: "todas.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_contentactw').html(data);


                          }
                        });
                      }

                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });

                    });
                  </script>
                </section>
                <section id="section-salud">
                  <br>
                  <div class="table-responsive" id="dynamic_salud"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1salud.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_salud').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>               
                <section id="section-construccion">
                  <br>
                  <div class="table-responsive" id="dynamic_construccion"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1construccion.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_construccion').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-tecnologia">
                  <br>
                  <div class="table-responsive" id="dynamic_tecnologia"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1tecnologia.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_tecnologia').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-educacion">
                  <br>
                  <div class="table-responsive" id="dynamic_educacion"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1educacion.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_educacion').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-alimentos">
                  <br>
                  <div class="table-responsive" id="dynamic_alimentos"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1alimentos.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_alimentos').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-super-m">
                  <br>
                  <div class="table-responsive" id="dynamic_superm"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1super-m.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_superm').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-automotriz">
                  <br>
                  <div class="table-responsive" id="dynamic_automotriz"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1automotriz.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_automotriz').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-comunicacion">
                  <br>
                  <div class="table-responsive" id="dynamic_comunicacion"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1comunicacion.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_comunicacion').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
                <section id="section-industria">
                  <br>
                  <div class="table-responsive" id="dynamic_industria"></div>
                  <script>
                    $(document).ready(function() {
                      load_data(1);
                      function load_data(page, query = '') {
                        $.ajax({
                          url: "1industria.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>",
                          method: "POST",
                          data: {
                            page: page,
                            query: query
                          },
                          success: function(data) {
                            $('#dynamic_industria').html(data);
                          }
                        });
                      }
                      $(document).on('click', '.page-link', function() {
                        var page = $(this).data('page_number');
                        var query = $('#search_boxact').val();
                        load_data(page, query);
                      });

                      $('#search_boxact').keyup(function() {
                        var query = $('#search_boxact').val();
                        load_data(1, query);
                      });
                    });
                  </script>
                </section>
              </div><!-- /content -->
            </div><!-- /tabs -->

          <?php
          } elseif ($perfilem == 'Agente') {
          ?>
            <!-- perfil de agente -->
            <div class="cuados">
              <img src="imagenes/canales.svg" width="30px" style="float:left;vertical-align: middle;margin:10px;">
              <p class="inter">
                <font color="" style="font-size:25px;"><b>Canales de atención</b></font>
              </p>
              <p class="intertw">
                <font color="" style="font-size:13px;">
                  Panel principal de agente, aquí podrás ver los canales de atención que puedes atender.<br>

                </font>
              </p>

            </div>

            <div class="col-12 tm-block-col">
              <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">



                <div class="table-responsive" id="dynamic_contentact">

                </div>

                <script>
                  $(document).ready(function() {

                    load_data(1);

                    function load_data(page, query = '') {
                      $.ajax({
                        url: "lista_espagente.php?rango=<?php echo $rango ?>&usuar=<?php echo $idusuario ?>&cliente=<?php echo $acliente ?>&sitiotw=<?php echo $sitionew ?>&idcliente=<?php echo $idusuario ?>",
                        method: "POST",
                        data: {
                          page: page,
                          query: query
                        },
                        success: function(data) {
                          $('#dynamic_contentact').html(data);
                        }
                      });
                    }

                    $(document).on('click', '.page-link', function() {
                      var page = $(this).data('page_number');
                      var query = $('#search_boxact').val();
                      load_data(page, query);
                    });

                    $('#search_boxact').keyup(function() {
                      var query = $('#search_boxact').val();
                      load_data(1, query);
                    });

                  });
                </script>



              </div>
            </div>



          <?php
          } elseif ($perfilem == 'SI') {
          ?>

            <?php
            include("servicios/mod.php");
            ?>


            <?php
            include("grafic/estatics.php");
            ?>

          <?php
          }
          ?>


        </div>
      </div>


    </div>


    <?php
    include("sitio.php");
    ?>


    <?php
    include("noti.php");
    ?>


    <?php
    include("unirse.php");
    ?>


    <?php
    include("bloc.php");
    ?>

    <script>
      let btn = document.querySelector("#btn");
      let sidebar = document.querySelector(".sidebar");
      let searchBtn = document.querySelector(".bx-search");

      btn.onclick = function() {
        sidebar.classList.toggle("active");
      }
      searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
      }
    </script>




    <script src="js/cbpFWTabs.js"></script>
    <script>
      (function() {

        [].slice.call(document.querySelectorAll('.tabs')).forEach(function(el) {
          new CBPFWTabs(el);
        });

      })();
    </script>

    <script type="text/javascript">
      window.onload = function() {
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';

      }
    </script>

  <?php
} else {

  include("vsesion/seguridad.php");
}
  ?>
  </body>

  </html>
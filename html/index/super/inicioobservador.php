<!DOCTYPE html>
<html lang="en">
  <style>
    #info_caremelo_detalles div.form-group > label{
      color:grey;
    }
    #info_caremelo_detalles div.col-md-6 div.form-group{
      background: rgba(0,0,0,.001);
      border-bottom: 1px solid rgba(0,0,0,.1);
    }
  </style>
  <head>
    <?php include(OVERALL.'header.php'); ?>
    <title>San Mateo</title>
    
    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">
    <link rel="stylesheet" type="text/css" href="view/app/css/superobservador.css">
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation Barra de navegacion horizontal y vertical-->
    <?php include(OVERALL.'navbar.php'); ?>

    <div class="content-wrapper">

      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <!-- migas de pan -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?view=inicioindex">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Observador del alumno</li>
        </ol>


          <div class="caja-content animated fadeIn" id="cajabuscar">
            <form class="" action="" method="post" id="search-observador">

              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="">Busqueda</label>
                    <input type="text" autofocus autocomplete  placeholder="Buscar" class="form-control buscarestudiante" name="buscarestudiante" placeholder="buscarestudiante" value="">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" style="text-align: center; margin-bottom: 10px;">
                    
                    <!-- <input type="submit" name="enp" value="Buscar"> -->
                    <button type="submit" name="button" class="btn mt-4 btn-info btn-block" id="buscaro"><i class="fa fa-search"></i> Buscar</button>
                  </div>
                </div>

              </div>
            </form>

          </div>


          <div class="row">
            <div class="col-md-12 rta-busqueda" id="rta-vista-observador" >

            </div>
          </div>


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->




    <?php include(OVERALL.'footer.php'); ?>

    <?php include(OVERALL.'footer.html'); ?>

    <script src="view/app/js/superBusqueda.js"></script>
  </body>
  </html>

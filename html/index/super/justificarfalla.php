<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <?php include(OVERALL.'navTabsasistencia.php'); ?>
    <title>San Mateo</title>
    
    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">

  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation Barra de navegacion horizontal y vertical-->
    <?php include(OVERALL.'navbar.php'); ?>

    <div class="content-wrapper">

      <div class="container-fluid">
    

        <?php navTags("","active"); ?>

        <div class="tab-content">
            <div id="newmatricula">
              <div class="row">
                <div class="col-md-12">
                    <!-- Breadcrumbs -->
                    <!-- migas de pan -->
                    <br>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?view=inicioindex">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active">Justificar asistencia del alumno</li>
                    </ol>
                </div>

                <div class ="col-md-12">

                   
                      <div class="col-md-4" style="float:right">
                        <div class="row">
                          <label class="col-md-2">Buscar    </label>
                          <div class="col-md-10">
                            <input type="text" class="form-control form-control-sm " placeholder="Ingrese el curso o el nombre" id="cajabuscar">  
                          </div>
                        </div>
                      </div>
                  

                </div>


              </div>
            </div>
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    <?php include(OVERALL.'footer.php'); ?>


    <?php include(OVERALL.'footer.html'); ?>
    <script src="<?=VAPP.'js/asistencia/justificarfalla.js'; ?>"></script>
  </body>
  </html>

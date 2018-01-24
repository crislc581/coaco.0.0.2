<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <title>San Mateo</title>
    
    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">

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
          <li class="breadcrumb-item active">Reporte de periodos</li>
        </ol>
        
        <div class="row">
          <div class="col-md-12">
            <div class="form-group text-lg-right">
              <a href="#"> <i class="fa fa-file-text-o"> </i> Generar cursos</a>
            </div>
          </div>
        </div>    
  
        <div class="row mb-4">
          <div class="col-md-6">
            <h4>Reportes <small>escolares</small>   </h4>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <a href="#" id="showLoadFileCvs" class="btn btn-success btn-sm mr-3"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Subir csv </a>
            <a href="#modalFrmData" data-toggle="modal" id="newUsuario" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"> </i> Nuevo usuario</a>
          </div>
        </div>
  
        <div class="alert alert info">
        
        </div>

        <!--Subir archivo cvs-->
        <div class="row animated fadeIn mb-4" id="boxFrmLoadCvs" style="display: none">
          <div class="col-md-12">
            <div class="card card-outline-success " style="padding: 10px;">
              <div class="card-block">
                <div class="card-blockquote">

                  <form class="" action="" method="post" enctype="multipart/form-data" id="frmLoadSvc" style=" overflow: auto;display: flex; justify-content: space-between; flex-wrap: wrap;" >
                    <input type="file" name="fileDirective" id="fileDirective" required style="padding: 5px" >
                    <input type="hidden" value="nada" name="dataInactuvo">
                    <div style="padding: 5px;">
                       <button class="mr-3 ml-3 btn btn-sm btn-default" type="button" id="btnHideBoxFrmLoadCvs">Cancelar</button>
                       <button type="submit" id="btnSaveSvcFile" class=" btn btn-sm btn-primary"> <i class="fa fa-save"></i> Guardar</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>


        <!--Mesanges de error-->
        <div class="row">
          <div class="col-md-12">
            <div id="rta_ajax_info"></div>
          </div>
        </div>
      


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    <?php include(OVERALL.'footer.php'); ?>


    <?php include(OVERALL.'footer.html'); ?>

    <script src="<?=VAPP.'js/crudReportesPorPeriodo.js'; ?>"></script>

  </body>
  </html>

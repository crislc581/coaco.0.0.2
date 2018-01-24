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
          <li class="breadcrumb-item active">Subir archivos csv</li>
        </ol>

        <div class="row">

          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a  class="nav-link active" href="#"><i class="fa fa-user"></i> Lista de alumnos de la instituciòn.</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-copy"></i> Nueva Matricula</a>
              </li>
            </ul>
          </div>

          <div class="col-md-12">
            <div class="tab-content">
              <div class="tab-pane active" id="newalumno" role="tabpanel">
                <form  method="post" action="index.php?view=subirarchivo" enctype="multipart/form-data" id="idfrm">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-info mt-4">
                        <strong>Nota !</strong>
                        <p>Tenga encuenta que si deligencia bien el documento, podemos tener problemas futuros con la informacion de los alumnos, ademas el sistema no funcionara adecuadamente.</p>
                      </div>
                    </div>
                    

                        <div class="col-sm-5">
                          <label class="custom-file" style="width: 100%; ">
                            <input type="file" id="archivo" name="archivo" class="custom-file-input" style="padding: 5px;">
                            <span class="custom-file-control"></span>
                          </label>
                        </div>
                        <div class="col-sm-3 ">
                          <input class="btn btn-primary btn-block" type="button" name="datos" value="Subir" onclick=" validardocumento();">
                        </div>
                        <div class="col-md-12 mt-3" id="rta_ajax_info">
                          
                        </div>
                   
                  </div>
                </form>
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

    <script type="text/javascript">
      function validardocumento()
      {
        var ele = $("#rta_ajax_info");
        var valor = $('#archivo').val();
          if(valor == "" || valor ==null || valor.length == 0){
            ele.html(alertGeneral("warning","flash","warning","  Advertencia!  ","Seleccione un documento, con la estencion csv."));
          }else{
            var frm = new FormData(document.getElementById('idfrm'));
            
            $.ajax({
              url: 'ajax.php?option=archivoplanoalumno',
              method: 'POST',
              data: frm,
              contentType: false,
              processData: false,
              beforeSend:function(){
                ele.html("Cargando");
              },
              success:function(msg){
                ele.html("");
                console.log(msg);
              }
            });
            
          }
      }


      $('#archivo').change(function(event) {
        var ele = $("#rta_ajax_info");
        var archivo = document.getElementById("archivo").files;
        var navegador = window.URL || window.webKitURL;
        archivo = archivo[0];  
        
        if (archivo.type != "text/csv") {
          ele.html(alertGeneral("warning","flash","warning","  Advertencia!  ","Deve seleccionar un documento <strong>csv </strong>de lo alcontrario no se podra importar la informacion."));
        }else{
           ele.html("");
          var valor = $(this).val();
          if(valor == "" || valor ==null || valor.length == 0){
            ele.html(alertGeneral("warning","flash","warning","  Advertencia!  ","Seleccione un documento, con la estencion csv."));
          }else{
            var url = navegador.createObjectURL(archivo);
               ele.html("");
               $('[name="datos"]').focus();
          }
        }


      });




    </script>
  </body>
  </html>

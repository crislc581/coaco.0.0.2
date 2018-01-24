<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">
    <title>San Mateo</title>

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
            <a href="#">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Mis informes</li>
        </ol>

        <div class="row">
          <div class="col-md-6 mb-3">
          <div class="card ">
            <div class="card-header">
              <i class="fa fa-home"></i>
              Registro
            </div>
            <div class="card-body">
              <a href="">Agregar jornada</a>
              <hr>
              <table class="table table-striped" id="tabla-jornada">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                  </tr>
                </thead>

              </table>
            </div>
          </div>
          </div>
          <div class="col-md-6 mb-3">Contenido 2</div>
        </div>






      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <?php include(OVERALL.'footer.php'); ?>



    <!-- Logout Modal -->
    <!-- modal de cerrar sesion -->
    <div class="modal fade in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="?view=cerrarsesion">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>


    <?php include(OVERALL.'footer.html'); ?>
    
    <script src="view/app/js/superInicioForm.js"></script>
    <script type="text/javascript">

   
   
// listarJornada();

// function listarJornada(){
//   $("#tabla-jornada").DataTable({
//     destroy:true,
//     "ajax":{
//       "url":"ajax.php?option=listarJornada",
//       "method":"post",
//       "data":{jj:"jj"}

//     },
//     "columns":[
//       {"data":"0015id"},
//       {"data":"0015desJornada"}
//     ]
//   });

// }
// listar();
function p(){
  $.ajax({
    url:'ajax.php?option=listarJornada',
    method:'post',
    data:{s:"d"},
    success:function(ee){
      console.log(ee);

    }
  });
}
p();



 function listar(){

      var table=$("#tabla-jornada").DataTable({
        destroy:true,
        "ajax":{
          "url":"ajax.php?option=listarJornada&option1=listar",
          "method":"post",
          "data":{da:"ha"}
        },
        "columns":[
          {"data":"0015id"},
          {"data":"0015desJornada"}

        ],
        language:espanis

      });
      // obtener_data_editar("#dt_cliente tbody",table);
      // obtener_id_eliminar("#dt_cliente tbody",table);
    }





var espanis = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           " _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      " 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
listar();

$('#tabla-jornada_wrapper > div.row').css({
  overflowX : 'auto'
});

    </script>

  </body>


</html>

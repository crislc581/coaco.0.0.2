<?php

require(CCONTROL."controllerTomarasistenciaControl.php");
//require(CCONTROL.'superlistarcombos.php');

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <title>San Mateo</title>

    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">
    <link rel="stylesheet" href="<?=VAPCSS.'supertomarAsistencia.css';?>">

    <style media="screen">

    /*Modal validacion de toma de asistencia*/
    .cabezaValida, h4, .cerrarVal {
      background-color: #0092b3;
      color:white !important;
      text-align: center;
      font-size: 20px;
    }
    .pieVal {
      background-color:#0092b3;
    }

    .valida1{background:#0092b3; color:white}
    .valida1:hover{background:#04809c;transition: .3s; color:white}
    .valida1:active{background:#026e86; color:white}

    </style>
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
          <li class="breadcrumb-item active">Nueva asistencia</li>
        </ol>


        <!-- loedader -->
        <div class="center-loader ocultar-elemento">
          
        </div>
        <!-- fin loader -->



        <!-- Nuevo frm tomar asistencia -->
        <div class="row">
          <div class="col-md-12">
              <div class="contenidoOne">
                <div class="row">
                  <div class="col-md-12">
                    <div class=" cabezaa">

                      <form>
                        <div class="row">
                          <div class="col-md-12" style="text-align:right">
                            <?php

                              $d = date('Y-m-d');
                              $fecha = strftime("%d de %B de %Y", strtotime($d));


                             ?>
                            <strong> <?=ucwords($fecha); ?></strong>
                          </div>
                          <div class="col-md-9">
                            <br>
                            <div class="form-group cursos">
                              <select class="form-control" id="select-curso">
                                <option value="0">Seleccione un curso</option>
                                <?php listarCursoMatricula(); ?>
                                <?php // $datos4=$obj->query('SELECT descripcion_cur FROM cursos'); ?>
                                <?php // while($row4=$obj->recorrer($datos4)): ?>
                                  <!-- <option value="<?php // echo $row4['descripcion_cur']; ?>"><?php // echo $row4['descripcion_cur']; ?></option> -->
                                <?php // endwhile; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <br>
                            <div class="tomarAsi">
                              <button type="button" id="cursoToma" class="btn">Tomar asistencia  <i class="fa fa-list"></i></button>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!-- <div class="row">

                        <div class="col-md-4">
                          as
                        </div>
                        <div class="col-md-4">
                          as
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="navegar2 row">
                  <div class="col-md-12">
                    <?php // include('html/index/operario/overal/formularioTomaAsistencia.php'); ?>


                    <!-- formulario de tomar la asistencia -->





                      <form>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="table-responsive ">
                             <table class="table   table-hover table-striped">
                               <thead>
                                 <tr class="active success">
                                   <!-- <th>ID</th> -->
                                   <th>APELLIDO</th>
                                   <th>NOMBRE</th>
                                   <!-- <th>CURSO</th> -->
                                   <th>TARDE</th>
                                   <th>NO UNIFORME</th>
                                   <th>EVACION</th>
                                   <th>FALLA</th>
                                 </tr>
                               </thead>
                               <tbody class="nuevo">

                               </tbody>
                             </table>
                           </div>
                          </div>
                        </div>


                        <div class="barrapie mb-3">
                          <div class="row">
                            <!--Elegir la materia-->
                            <div class="col-md-4">
                              <br>
                              <div class="form-group materia">
                                <label for="selectMateria">*Materia: </label>
                                <select class="form-control" id="selectMateria">
                                  <option value="">Materia </option>
                                  <?=lisMaterias();
                                   ?>
                                  <?php // $datos = $obj->query('SELECT descripcion_mate FROM materias ') ?>
                                  <?php // while($row=$obj->recorrer($datos)): ?>
                                  <!-- <option value="<?php // echo $row['descripcion_mate']; ?>"><?php // echo $row['descripcion_mate']; ?></option> -->
                                <?php // endwhile; ?>
                                </select>
                              </div>
                            </div>

                            <!--Eligir el bloque de hora-->
                            <div class="col-md-4">
                              <br>
                              <div class="form-group bloque">
                                <label for="selectBloque">*Bloque:</label>
                                <select class="form-control" id="selectBloque">
                                  <option value="">Hora de la clase</option>
                                  <?=lisBloque(); ?>
                                  <?php // $datos1 = $obj->query('SELECT descripcion_blo FROM bloque') ?>
                                  <?php // while($row1=$obj->recorrer($datos1)): ?>
                                  <!-- <option value="<?php // echo $row1['descripcion_blo']; ?>"> <?php // echo $row1['descripcion_blo']; ?> </option> -->
                                    <?php // endwhile; ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <br>
                              <div class="form-group materia">
                                <label for="selectMateria">*Periodo: </label>
                                <select class="form-control" id="selectP" name="per">
                                  <option value="">Periodo </option>
                                  <?=lisPeriodo();
                                   ?>
                                  <?php // $datos = $obj->query('SELECT descripcion_mate FROM materias ') ?>
                                  <?php // while($row=$obj->recorrer($datos)): ?>
                                  <!-- <option value="<?php // echo $row['descripcion_mate']; ?>"><?php // echo $row['descripcion_mate']; ?></option> -->
                                <?php // endwhile; ?>
                                </select>
                              </div>
                            </div>
                            <!-- select desplegable del dia de la semana-->
                              <!-- <div class="col-md-4"> -->
                              <input type="hidden" name="dia" value="<?=_dia();?>">

                          </div>

                            <div class="row">
                              <!--Descripcion de la clase-->
                              <div class="col-md-6">
                                <br>
                                <label for="descripcionClase">Descripcion de la clase:</label>
                                <textarea id="descripcionClase" rows="3" cols="40" class="form-control"></textarea>
                              </div>

                              <!--Observacion de la clase-->
                              <div class="col-md-6">
                                <br>
                                <label for="observacion">Observacion: </label>
                                <textarea id="observacion" rows="3" cols="40" class="form-control"></textarea>
                              </div>
                            </div>


                            <div class="row">
                              <div class="col-md-12">
                                <div class="alerta-toma">
                                  <br>
                                  <div class="alert-message alert-message-info  fadeIn">
                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                      <strong><i class="fa fa-view"></i> Nota! </strong>
                                      <p>Los campos de: <b>descripcion de la clase</b> y <b>observaciones</b> son opcionales, por favor los campos con el asterisco (*) son de vital imporatncia que los completes.</p>
                      
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">

                                <button type="button" id="tomaFin">Aceptar <i class="fa fa-paste"></i></button>
                              </div>
                            </div>
                        </div>

                      </form>


                    <!-- end del formulario de tomar asitencia -->


                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- Nuevo fin frm tomar asistencia -->











        <!-- alertas para enviar al usuario -->


        <!-- Modal -->

          <div class="modal fade in " id="alerta-curso">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-body">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <div class="alert alert-danger">
                  <strong><i class="glyphicon glyphicon-pushpin"></i> Alerta!</strong><p>
                    Seleccione un curso para tomar su respectiva asistencia.
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="aceptar-modal-curso" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>

          <div class="modal fade in" id="asistenciaValida" role="dialog">
            <div class="modal-dialog modal-sm">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header cabezaValida" style="padding:9% 6%;">
                  <button type="button" class="close cerrarVal" data-dismiss="modal">&times;</button>
                  <h4><span class="glyphicon glyphicon-lock"></span> Seguridad del sistema</h4>
                </div>
                <div class="alerta-valida">
                  <div class="alert alert-info fade in">
                    <a href="#" data-dismiss="alert" class="close ">&times;</a>
                    <strong class="glyphicon glyphicon-lock"></strong> Estamos hacegurando de que nadien pueda falcificar la asistencia de los estudiantes
                  </div>
                </div>
                <div class="modal-body" style="padding: 8% 10%;">
                  <form role="form">
                    <div class="form-group">
                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
                      <input type="password" class="form-control" id="ope-clave" placeholder="Usuario">
                    </div>
                    <br>
                      <button type="button" class="btn  btn-block valida1"><span class="glyphicon glyphicon-off"></span> Iniciar</button>
                  </form>
                </div>
                <div class="modal-footer pieVal">
                  <button type="submit" class="btn btn-info btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
              </div>
            </div>
          </div>

          <!--Error modal el curso ya exite-->
          <div class="modal fade in" id="cursoRepeti">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body" style="color:#8a6d3b; background-color:#fcf8e3 ;border-color:#faebcc;">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong><i class="glyphicon glyphicon-floppy-remove" style="font-size:20px"></i> Error!</strong><p>
                    El curso que elejistes, ya fue tomada su asistencia.
                  </p>
                </div>
                <div class="modal-footer" style="color:#7e6130; background-color:#ebe5c5; border-color: #e3cfa7;">
                  <button type="button" class="btn btn-warning" id="aceptar-modal-curso" data-dismiss="modal">Aceptar</button>
                </div>
              </div>
            </div>
          </div>

          <!--MODAL PARA CONTINUAR O SALIR DE LA TOMA DE ASISTENCIA-->
          <div class="modal fade in" id="continuaAsistencia">
            <div class="modal-dialog" style="width: 460px;margin: 360px auto;">
              <div class="modal-content">
                <div class="modal-body" style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;">
                  <a href="#" data-dismiss="modal" class="close">&times;</a>
                  <i class="glyphicon glyphicon-ok"></i> <strong>Ok</strong>
                  <p>
                    Se ha tomado la asistencia correctamente.
                  </p>
                </div>
                <div class="modal-footer" style="color: #326b33;background-color: #cee6c4;border-color: #c1daac;">
                  ¿Deseas continuar, tomando la asistencia?
                  <button type="button" class=" btn btn-success" id="recargar">Continuar</button>
                  <a href="?cargar=operario" class="btn btn-default">Salir</a>
                </div>
              </div>
            </div>
          </div>

        <!-- finvalidaciones de asistencia -->

















      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    <?php  include(OVERALL.'footer.php'); ?>
    <?php include(OVERALL.'footer.html'); ?>

    <!-- script de toma de asistencia -->
    <script src="<?=VAPP.'js/asistencia/supervalidaAsistencia.js';?>"></script>
    <script src="<?=VAPP.'js/asistencia/supertomaAsistencia.js';?>"></script>
    

  </body>
  </html>

<?php require(CCONTROL.'superlistarcombos.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <title>San Mateo</title>
    <style media="screen">

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
            <a href="">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Directivas</li>
        </ol>

        <div class="form-group">
          <a href="#modalBarrio" data-toggle="modal"><i class="fa fa-plus" ></i> Agregar Barrio</a>

          <a style="margin-left:20px" href="#modalEps" data-toggle="modal"><i class="fa fa-plus" ></i>   Agregar Eps</a>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <h4>Informacion de las directivas</h4>
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

                  <form class="" action="" method="post" enctype="multipart/form-data" id="frmLoadSvc" style="display: flex; justify-content: space-between;" >
                    <input type="file" name="fileDirective" id="fileDirective" required >
                    <input type="hidden" value="nada" name="dataInactuvo">
                    <div>
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

        <div class="row">
          <div class="col-md-12 boxTable" >
            <div class="table-responsive" style="overflow:auto;">
              <table class="table-directivas table table-striped table-hover table-condensed">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Tipo documento</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Barrio</th>
                    <th>Jornada</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody class="datosT">

                </tbody>
              </table>
            </div> <!--end table responsive-->
          </div> <!--End col -md 12-->
        </div> <!--End row-->


        <!-- Modales de la pagina -->

        <!--modal  formulario de directivas-->
        <div class="modal fade bd-example-modal-lg" id="modalFrmData">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h4>Datos generales</h4>
                <a href="#" data-dismiss="modal" class="close">&times;</a>
              </div>
              <div class="modal-body">
                <form class="" action="nuevaDirectiva" method="post" id="frmDataDirectivas">
                  <div class="row">

                    <div class="col-md-12">
                      <h5>Información  personal</h5>
                      <hr>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Tipo de ducumento</label>
                        <select class="form-control" name="tipoDocumento" class="form-control" required="">
                          <option></option>
                          <?=lisTD(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Documento</label>
                        <input type="hidden" name="idDirectiva" value="">
                        <input type="number" name="documento" class="form-control" placeholder="Documento" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Correo</label>
                        <input type="email" name="email" class="form-control" placeholder="Correo electronico" required>
                      </div>
                    </div>

                     <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Celular</label>
                        <input type="number" name="celular" class="form-control" placeholder="Celular" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="tel" name="tel" class="form-control" placeholder="telefono" required>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" class="form-control" placeholder="Fecha de nacimiento" required>
                      </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Genereo</label>
                        <select class="form-control" name="genero" class="form-control" required>
                          <option></option>
                          <?php lisGenero(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Estado civil</label>
                        <select class="form-control" name="estadoCivil" class="form-control" required>
                          <option ></option>
                          <?php listEstadoCivil(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Eps</label>
                        <select class="form-control" name="eps" class="form-control" required id="eps">
                          <option ></option>
                          <?php //lisEps(); ?>
                        </select>
                      </div>
                    </div>



                          <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Departamento</label>
                                <select class="custom-select" name="departamento" id="departamento" >
                                </select>
                            </div>
                          </div>

                           <div class="col-sm-6 col-md-4">
                             <div class="form-group">
                                 <label>Ciudad / Municipio</label>
                                 <select class="form-control" name="ciudad" id="ciudad" >
                                 </select>

                             </div>
                           </div>

                           <div class="col-sm-6 col-md-4">
                             <div class="form-group">
                                 <label>Barrio</label>
                                 <select class="form-control" name="barrio" id="barrio" required>
                                 </select>
                             </div>
                           </div>



                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Jornada</label>
                        <select class="form-control" name="jornada" class="form-control" required>
                          <option></option>
                          <?php lisJornada(); ?>
                        </select>
                      </div>
                    </div>



                    <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="">Rol</label>
                        <select class="form-control" name="rol" class="form-control" required>
                          <option></option>
                          <?php lisRoles(); ?>
                        </select>
                      </div>
                    </div>





                    <div class="col-md-12 " >
                      <div class="row " style="background: #f7f7f7 !important">

                        <div class="col-md-12">
                          <h5 style="padding-top: 10px;">Datos de los acudientes</h5>
                          <hr>
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombreAcu" class="form-control" placeholder="Nombre del acudiente" required>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" name="apellidoAcu" class="form-control" placeholder="Apellido del acudiente" required>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="">Celular</label>
                            <input type="number" name="celularAcu" class="form-control" placeholder="Celular del acudiente" required>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="number" name="telAcu" class="form-control" placeholder="Telefono del acudiente" required>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                      <br>
                        <input type="reset" id="limpiarFrm" style="display: none;">
                        <button type="submit" class="btn btn-block btn-primary" name="btn-send"><span> <i class="fa fa-save"></i> Guardar datos  </span></button>
                      </div>
                    </div>


                  </div>
                </form>



              </div>
            </div>
          </div>
        </div>

        <!--Modal de eps-->
        <div class="modal fade in" id="modalEps">
          <div class="modal-dialog">
            <div class="modal-content ">
              <div class="modal-header bg-primary text-white">
              <h3 align="center">Ingrese Nueva Eps</h3>
              </div>
              <div class="modal-body">
              <div class="form-group" id="rta-eps">

              </div>

            <div class="form-group">
            <div>
              <label>Nombre</label>
              <input type="text" name="nuevaEps" id="nuevaEps" class="form-control">

            </div>
              <span class="msg"></span>
            </div>

            <div class="form-group">
            <div>
              <label>Telefono</label>
              <input type="number" name="telEps" id="telEps" class="form-control">
            </div>
              <span class="msg"></span>
            <div class="form-group">
            <br>
                         <button type="button" class="btn btn-primary" id="registrarEps"> Guardar cambios</button>
            </div>
            </div>

              </div>

            </div>
          </div>
        </div>

        <!-- Modal Barrio  -->
        <div class="modal fade in" id="modalBarrio">
          <div class="modal-dialog">
            <div class="modal-content ">
              <div class="modal-header bg-primary text-white">
                <h3 align="center">Nuevo barrio</h3>
                <a href="#" class="close" data-dismiss="modal">&times;</a>
              </div>
              <div class="modal-body">
              <div class="form-group" id="rta-barrio">

              </div>

              <div class="form-group">

              <label>Departamento</label>
                <select class="custom-select form-control" name="departamento" id="departamento1" >

              </select>

              </div>
              <div class="form-group">
              <label>Ciudad</label>
              <select class="custom-select form-control" name="ciudad" id="ciudad1"  >
              <option selected></option>

              </select>
            </div>
            <div class="form-group">
              <label>Nuevo Barrio</label>
              <input type="text" name="nuevoBarrio" id="nuevoBarrio" class="form-control">

            </div>
            <span class="msg"></span>


              </div>
              <div class="modal-footer">

                <input type="button" name="registrarBarrio" id="registrarBarrio" class="btn btn-md btn-primary" value="Registrar">
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

    <script src="<?=VAPP.'js/superListaDirectivas.js'; ?>"></script>
    <script src="<?=VAPP.'js/superlistaComboDirectivas.js'; ?>"></script>
  </body>
  </html>

<?php require(CCONTROL.'superlistarcombos.php');

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>

    <link rel="stylesheet" type="text/css" href="<?=VAPCSS; ?>superestilosfrmalumno.css">
    <link rel="stylesheet" type="text/css" href="<?=VAPCSS; ?>superallmatricula.css">


    <title>Matricular alumno</title>
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  	<!-- Navigation Barra de navegacion horizontal y vertical-->
    <?php include(OVERALL.'navbar.php'); ?>
    <div class="rta_loaderr" id="loader_pagin_copleta"></div>
    <div class="content-wrapper">
      	<div class="container-fluid">

          
          <ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a  class="nav-link " href="?view=superinicio&pagin=registraralumno"><i class="fa fa-user"></i> Nuevo Alumno</a>
						</li>
						<li class="nav-item">
							<a  class="nav-link active" href="?view=superinicio&pagin=registrarmatricula"><i class="fa fa-copy"></i> Nueva Matricula</a>
						</li>
					</ul>

          <div class="tab-content">
            <div id="newmatricula">


              <!-- migas de pan -->
              <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item">
                  <a href="#">Matricular alumnno</a>
                </li>
                <li class="breadcrumb-item active">Nuevo Matricula</li>
                <span style="float:right"><?php

                $d = date('Y-m-d');
                $fecha = strftime("%d de %B de %Y", strtotime($d));
                echo ucwords($fecha);

                 ?></span>
              </ol>

              <div class="row animated fadeIn">
                <div class="col-md-12">
                  <div class="form-group">

                  </div>
                  <div class="form-group">
                    <div class="alert alert-info fadeIn">
                      <a href="#" data-dismiss="alert" class="close">&times;</a>
                      <b>Información!</b>
                      <p>En este campo de busqueda podemos hacer filtros de busqueda falcilmente y rapido, con tan solo poner el numero del documento,nombre,apellido y curso obtendremos una informe con más detalles para  hacer la respectiva matricula al estudiante.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end animated fadeIn">
                <div class="col-sm-4 cent">
                 <!-- <a href="#" class="link"><i class="fa fa-area-chart"></i> Ver estadisticas</a>-->
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <!--<div class="input-group">

                      <select name="matricula" class="custom-select" id="matricula" onchange="validarformulario('matricula');" style="width:100%">
                       <option vaslue="'.$data['data'].'"> año a matricular</option> 
                        
                      </select>

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                    </div>-->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <!-- <label>Buscar:</label> -->
                    <div class="input-group">
                      <input type="text" onkeypress="return enter(event);" name="buscar_alu" value="" placeholder="Buscar" class="form-control">
                      <span class="input-group-btn">
                        <a type="button" href="#" name="button" id="btn-buscar_alu" class="btn btn-primary " ><i class="fa fa-search"></i></a>
                      </span>
                    </div>
                    <span style="font-size: 12px; color:#dc3545" class="animated fadeIn desaparecee_texto" id="campobusqueda">El campo debe ser requerido</span>
                  </div>
                </div>
              </div>




              <div class="row " id="rta_ajax_datosalumno">
               <!--  <div class="col-md-6 ">
                  <a href="#" class="enlace-alumno" >
                    <div class="row mb-3 class-hijo" style="margin:0.09em;box-shadow:1px 1px 5px rgba(0,0,0,.3)">
                      <div class="col-sm-2 col-md-3" style="padding-left:0px;">
                          <img src="http://www.lorempixel.com/100/100" alt="">
                      </div>
                      <div class="col-sm-8 col-md-9">
                        <div class="row c-c-info-a">
                          <div class="col-sm-12" style="font-size:10px;">
                            <span>Tipo Doc : C.C </span> | <span> N° Doc: 101242185</span>
                          </div>
                          <div class="col-sm-12" >
                            <strong><span >Romero Piñeros Cristian Camilo</span></strong><br>
                            <span> Curso: <b>1102</b>  </span> | -->
                            <!-- <span class="disabled-opa" style="font-size:12px;"> Matricuado:    Si  </span><br>
                            <cite style="font-size:12px;"> Para el año: </cite>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div> -->
              </div>






              <div class="row animated fadeIn" id="informacion_new_matricula">
                <div class="col-md-12">
                  <div class="card card-register mx-auto mt-2 mb-5">
                    <div class="card-header ">
                      <i class="fa fa-students"></i>Nueva matricula
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-md-12" style="text-align: center; margin: 20px; ">
                          <span id="vista_previa">
                            <img src="<?=VAPP.'imagenes/Thumbnail/avatardefault.png'?>" height="80" width="80" style="border-radius: 50%;" >
                            </span>
                            <div>
                              <label class="custom-file" style="margin: 20px;">
                                <input type="file" id="foto"  class="custom-file-input custom-file-input-sm" name="foto" onchange="validarformulario('foto');">
                                <span class="custom-file-control"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">

                            <select name="matricula" class="custom-select" id="matricula" onchange="validarformulario('matricula');" style="width:100%">
                              <option value="'.$data['data'].'"></option>
                            </select>

                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <label for="exampleInputName">Nombres</label>
                              <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                              <label for="exampleInputLastName">Last name</label>
                              <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" placeholder="Enter last name">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                              <label for="exampleConfirmPassword">Confirm password</label>
                              <input type="password" class="form-control" id="exampleConfirmPassword" placeholder="Confirm password">
                            </div>
                          </div>
                        </div>
                        <a class="btn btn-primary btn-block" href="login.html">Register</a>
                      </form>
                      <div class="text-center">
                        <a class="d-block small mt-3" href="login.html">Login Page</a>
                        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
  	</div>





  <!-- MODALES GEENRALES -->


  <!-- modal cdatos especificos de la matricula del alumno para registrar un matricula-->
  <div  role="dialog" class="modal fade" id="modal-info-alu-matricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3>Nueva matricula</h3>
                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                  </div>
                <div class="modal-body">

                  <div id="rta_ajax_frm">

                  </div>

                  

                </div>

                <div class="alerta">
                    
                  </div>
               <!-- <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </center>
                </div> -->
            </div>

        </div>
    </div>




    <?php include(OVERALL.'footer.php'); ?>





    <?php include(OVERALL.'footer.html'); ?>
    <script src="<?=VAPP.'js/supermatricula.js'; ?>">  </script>


    <script type="text/javascript">
      function enter(e){
        
        if (e.keyCode==13) {
          $("#btn-buscar_alu").click();
        }
      }
     




      $('[data-toggle="tooltip"]').tooltip();
      

    </script>





  </body>
</html>

<?php
require(CCONTROL.'superlistarcombos.php');
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>

    <link rel="stylesheet" type="text/css" href="<?=VAPCSS; ?>superestilosfrmalumno.css">
    <link rel="stylesheet" href="<?=VAPCSS; ?>superreigistraralumno.css">

    <title>San Mateo</title>
    
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  	<!-- Navigation Barra de navegacion horizontal y vertical-->
    <?php include(OVERALL.'navbar.php'); ?>

    <div class="content-wrapper">
      	<div class="container-fluid">

					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a  class="nav-link active" href="?view=superinicio&pagin=registraralumno"><i class="fa fa-user"></i> Nuevo Alumno</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?view=superinicio&pagin=registrarmatricula"><i class="fa fa-copy"></i> Nueva Matricula</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="newalumno" role="tabpanel">
							<!-- Breadcrumbs -->
					        <!-- migas de pan -->
					        <ol class="breadcrumb mt-4">
					          <li class="breadcrumb-item">
					            <a href="#">Matricular alumnno</a>
					          </li>
                    <!-- <li class="breadcrumb-item"></li> -->
					          <li class="breadcrumb-item active">Nuevo alumno</li>
					        </ol>

					        <div class="row animated fadeIn">
					          <div class="col-md-12">
					                <form action="" method="post" enctype="post" id="frmregistroalumno" class="frm-mi">
					               
					                  			<div class="form-group">

							                  		<a href="#modalBarrio" data-toggle="modal"><i class="fa fa-plus" ></i> Agregar Barrio</a>

							                  		<a style="margin-left:20px" href="#modalEps" data-toggle="modal"><i class="fa fa-plus" ></i>   Agregar Eps</a>
					                  			</div>
					                  			<div class="form-group" id="addAlumno">

					                  			</div>

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
					                  <h3>Matricula</h3>
								            <hr>
					                  <div class="row">
						                  	<div class="col-sm-4">

						                  		<div class="form-group">
						                  			<div class="input-group" >
						                  				<span  class="input-group-addon "><i class="fa fa-address-book" ></i></span>
						                  					<select class="custom-select" id="curso" name="curso" onchange="validarformulario('curso');">
						                  						<option selected>Seleccione un curso</option>
						                  						<?php lisCursos();	 ?>
						                  					</select>
                                      <span class=" derecha"></span>
                                    </div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-home"></i></span>
						                  					<select class="custom-select" id="sede" name="sede" onchange="validarformulario('sede');">
						                  						<option selected>Seleccione una sede</option>
						                  						<?php lisSede(); ?>
						                  					</select>
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-chevron-circle-right"></i></span>
						                  					<select class="custom-select" id="jornada" name="jornada" onchange="validarformulario('jornada');">
						                  						<option selected>Seleccione una jornada</option>
						                  						<?php lisJornada(); ?>
						                  					</select>
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
					                  			</div>
						                  	</div>

						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
							              				  <input type="number" class="form-control form-control-sm " placeholder="Grados cursados" data-toggle="tooltip" title="Grados cursados" id="gradosc" name="gradosc" onkeyup="validarformulario('gradosc');">
                                      <span class=" derecha"></span>
                                    </div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-edit"></i></span>
							              				 <input type="number" class="form-control form-control-sm " placeholder="Grados repetidos" data-toggle="tooltip" title="Grados repetidos" id="gradosr" name="gradosr" onkeyup="validarformulario('gradosr');">
                                      <span class=" derecha"></span>
                                    				</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>

						                  				<select name="matricula" class="custom-select" id="matricula" onchange="validarformulario('matricula');">
						                  				<option selected>Seleccione año a cursar</option>
						                  					<?php
						                  					$año=date("Y");
						                  					for($i=0; $i<5; $i++){
						                  					?>
						                  					<option value="<?=$año+$i; ?>"><?=$año+$i; ?></option>
						                  					<?php
						                  				}
						                  					 ?>
						                  				</select>

                                      <span class=" derecha"></span>
                                    				</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
					                  </div>
					                  <br>
					                  <h3>Datos del estudiante</h3>
								            
					                  	<hr>
					                  <!-- copia -->

      								        <div class="row">
      			                  	<div class="col-sm-4">

      			                  		<div class="form-group">
      			                  			<div class="input-group" >
      			                  				<span  class="input-group-addon "><i class="fa fa-user" ></i></span>
      			                  				<input type="text" class="form-control form-control-sm " placeholder="Nombre del estudiante" data-toggle="tooltip" title="Nombre del estudiante" id="nombres" name="nombres" onkeyup="validarformulario('nombres');">
                                      <span class=" derecha"></span>
                                    </div>
      			                  			<span class="msg"></span>
      			                  		</div>
      			                  	</div>
      			                  	<div class="col-sm-4">
      			                  		<div class="form-group">
      			                  			<div class="input-group">
      			                  				<span class="input-group-addon"><i class="fa fa-users"></i></span>
      			                  				<input type="text" class="form-control form-control-sm " placeholder="Apellidos del estudiante" data-toggle="tooltip" title="Apellido del estudiante" id="apellidos" name="apellidos" onkeyup="validarformulario('apellidos');">
                                      <span class=" derecha"></span>
      			                  			</div>
      			                  			<span class="msg"></span>
      			                  		</div>
      			                  	</div>
      			                  	<div class="col-sm-4">
      			                  		<div class="form-group">
      			                  			<div class="input-group">
      			                  				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
      			                  				<input type="number" class="form-control form-control-sm " placeholder="Celular" maxlength="10" id="celular" data-toggle="tooltip" title="Celular del estudiante" name="celular" onkeyup="validarformulario('celular');">
                                      <span class=" derecha"></span>
      			                  			</div>
      			                  			<span class="msg"></span>
      		                  			</div>
      			                  	</div>
      					              </div>

					                  	<div class="row">
                                <div class="col-sm-4">
      						                  		<div class="form-group">
      						                  			<div class="input-group">
      						                  				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
      							              				  <input type="number" class="form-control form-control-sm " placeholder="telFijo" id="telFijo" data-toggle="tooltip" title="Telefono fijo" name="telFijo" onkeyup="validarformulario('telFijo');">
                                            <span class=" derecha"></span>
                                          </div>
      						                  			<span class="msg"></span>
      						                  		</div>
      						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			                                <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Correo del alumno" data-toggle="tooltip" title="Correo del estudiante"  onkeyup="validarformulario('email');">
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon">Sexo</span>
						                  				<select class="custom-select" id="genero" name="genero" onchange="validarformulario('genero');">
						                  					<option selected>Seleccione un genero</option>
                                        <!--function php --><?php lisGenero(); ?>
						                  				</select>
                                      <span class=" derecha"></span>

						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
								             </div>

								              <div class="row">
                                <div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon">Rh</span>
						                  				<select class="custom-select" name="rh" id="rh" onchange="validarformulario('rh');" >
						                  					<option selected>Seleccione un tipo</option>
                                        <!--function php -->	<?php lisRh(); ?>

						                  				</select>
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
                                <div class="col-sm-4">
								                  		<div class="form-group">
								                  			<div class="input-group">
								                  				<span class="input-group-addon">Eps</span>
								                  				<select class="custom-select" name="eps" id="eps" onchange="validarformulario('eps');">




								                  				</select>
                                          <span class=" derecha"></span>
								                  			</div>
								                  			<span class="msg"></span>
								                  		</div>
								                  	</div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon">Fecha Nacimiento</span>
						                  				<input type="date" class="form-control form-control-sm " id="fecNacimiento" name="fecNacimiento" onchange="validarformulario('fecNacimiento');">
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
					                    </div>

					                   <div class="row">
                               <div class="col-sm-4">
  					              				<div class="form-group">
  					              					<div class="input-group">
  					              						<span class="input-group-addon">Tipo documento</span>
  					              						<select class="custom-select" name="tipDocumento" id="tipDocumento" onchange="validarformulario('tipDocumento');">
  					              							<option selected>Seleccione documento</option>
                                        <!--function php -->	<?=lisTD(); ?>
  					              						</select>
                                      <span class=" derecha"></span>
  					              					</div>
  					              					<span class="msg"></span>
  					              				</div>
						                  	</div>
                                <div class="col-sm-4">
                                 <div class="form-group">
                                   <div class="input-group">
                                     <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                     <input type="number" class="form-control form-control-sm " placeholder="Numero de documento" data-toggle="tooltip" title="Documento del estudiante" id="documento" name="documento" onkeyup="validarformulario('documento');">
                                     <span class=" derecha"></span>
                                   </div>
                                   <span class="msg"></span>
                                 </div>
                               </div>
						                  	<div class="col-sm-4">
						                  		<div class="form-group">
						                  			<div class="input-group">
						                  				<span class="input-group-addon"><i class="fa fa-home"></i></span>
						                  				<input type="text" class="form-control form-control-sm " placeholder="Direccion de la casa" data-toggle="tooltip" title="Dirección de la casa" id="direccion" name="direccion" onkeyup="validarformulario('direccion');">
                                      <span class=" derecha"></span>
						                  			</div>
						                  			<span class="msg"></span>
						                  		</div>
						                  	</div>
					                   </div>
                             <div class="row">
                               <div class="col-sm-4">
			                  		<div class="form-group">
			                  			<div class="input-group">
			                  				<span class="input-group-addon">Departamento</span>
			                  				<select class="custom-select" name="departamento" id="departamento" onchange="validarformulario('departamento');" >

			                  				</select>
                         					 <span class=" derecha"></span>
			                  			</div>
			                  			<span class="msg"></span>
			                  		</div>
			                  	</div>
                               <div class="col-sm-4">
                                 <div class="form-group">
                                   <div class="input-group">
                                     <span class="input-group-addon">Ciudad / Municipio</span>
                                     <select class="custom-select" name="ciudad" id="ciudad" onchange="validarformulario('ciudad');" >
                                       <option selected></option>
                                       <div id="rsp-c">

                                       </div>
                                     </select>
                                     <span class=" derecha"></span>
                                   </div>
                                   <span class="msg"></span>

                                 </div>
                               </div>
                               <div class="col-sm-4">
                                 <div class="form-group">
                                   <div class="input-group">
                                     <span class="input-group-addon">Barrio</span>
                                     <select class="custom-select" name="barrio" id="barrio" onchange="validarformulario('barrio');" >
                                       <option selected></option>
                                       <div id="rsp-b">

                                       </div>
                                     </select>
                                     <span class=" derecha"></span>
                                   </div>
                                   <span class="msg"></span>
                                 </div>
                               </div>
                             </div>
<br>
					                    <h3>Datos familiares</h3>
								            <hr>
								            <div class="row">
								            	<div class="col-sm-4">
								            		<div class="form-group">
								            			<small class="small">Informacion de la madre</small>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " data-toggle="tooltip" title="Nombre de la madre" placeholder="Nombre de la madre" id="nomMad" name="nomMad" onkeyup="validarformulario('nomMad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " data-toggle="tooltip" title="Apellido de la madre" placeholder="Apellido de la madre" id="apelMad" name="apelMad" onkeyup="validarformulario('apelMad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
						              					<div class="input-group">
						              						<span class="input-group-addon">Tipo documento</span>
						              						<select class="custom-select" name="tipDocMad" id="tipDocMad" onchange="validarformulario('tipDocMad');">
						              							<option selected>Seleccione</option>
						              							<!--function php --><?=lisTD(); ?>
						              						</select>
                                      <span class=" derecha"></span>
						              					</div>
						              					<span class="msg"></span>
						              				</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-edit"></i></span>
										                 	<input type="number" class="form-control form-control-sm " data-toggle="tooltip" title="Documento de la madre" placeholder="Numero de documento" id="docMad" name="docMad" onkeyup="validarformulario('docMad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " data-toggle="tooltip" title="Celular de la madre" placeholder="Numero Celular" id="celMad" name="celMad" onkeyup="validarformulario('celMad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero Telefono" data-toggle="tooltip" title="Numero de telefono" id="fijoMad" name="fijoMad" onkeyup="validarformulario('fijoMad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                		<input type="email" class="form-control form-control-sm" name="emailMad" id="emailMad" data-toggle="tooltip" title="Correo de la madre" placeholder="Correo electronico" onkeyup="validarformulario('emailMad');">
                                    <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            	</div>

								            	<div class="col-sm-4">
								            		<div class="form-group">
								            			<small class="small">Informacion del padre</small>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " placeholder="Nombre del padre" data-toggle="tooltip" title="Nombre del padre" id="nomPad" name="nomPad" onkeyup="validarformulario('nomPad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " placeholder="Apellido de la Padre" data-toggle="tooltip" title="Apellido del padre" id="apelPad" name="apelPad" onkeyup="validarformulario('apelPad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
						              					<div class="input-group">
						              						<span class="input-group-addon">Tipo documento</span>
						              						<select class="custom-select" name="tipDocPad" id="tipDocPad" onchange="validarformulario('tipDocPad');">
						              							<option selected>Seleccione</option>
						              							<!--dnction  php --><?=lisTD(); ?>
						              						</select>
                                      <span class=" derecha"></span>
						              					</div>
						              					<span class="msg"></span>
						              				</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-edit"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero de documento" data-toggle="tooltip" title="Numero de documento" id="docPad" name="docPad" onkeyup="validarformulario('docPad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero Celular" data-toggle="tooltip" title="Numero del celular" id="celPad" name="celPad" onkeyup="validarformulario('celPad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero Telefono" data-toggle="tooltip" title="Numero de telefono" id="fijoPad" name="fijoPad" onkeyup="validarformulario('fijoPad');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					                                		<input type="email" class="form-control form-control-sm" name="emailPad" id="emailPad" placeholder="Correo electronico" data-toggle="tooltip" title="Correo del padre" onkeyup="validarformulario('emailPad');">
                                              <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            	</div>


								            	<div class="col-sm-4">
								            		<div class="form-group">
								            			<small class="small">Informacion del Acudiente</small>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " placeholder="Nombre del acudiente" data-toggle="tooltip" title="Nombre del acudiente" id="nomAcu" name="nomAcu" onkeyup="validarformulario('nomAcu');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
										                 	<input type="text" class="form-control form-control-sm " placeholder="Apellido de la Acudiente"  data-toggle="tooltip" title="Apellido del acudiente" id="apelAcu" name="apelAcu" onkeyup="validarformulario('apelAcu');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>


								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero Celular"  data-toggle="tooltip" title="Numero de celular" id="celAcu" name="celAcu" onkeyup="validarformulario('celAcu');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										                 	<input type="number" class="form-control form-control-sm " placeholder="Numero Telefono" id="fijoAcu"  data-toggle="tooltip" title="Numero de telefono" name="fijoAcu" onkeyup="validarformulario('fijoAcu');">
                                      <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            		<div class="form-group">
								            			<div class="input-group">
								            				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					                                		<input type="email" class="form-control form-control-sm" name="emailAcu" id="emailAcu" placeholder="Correo electronico"  data-toggle="tooltip" title="Correo del acudiente" onkeyup="validarformulario('emailAcu');">
                                              <span class=" derecha"></span>
								            			</div>
								            			<span class="msg"></span>
								            		</div>
								            	</div>



								            </div>
								            <div class="form-group">
								            <input type="button" name="enviartodo" id="enviartodo" class="btn btn-md btn-primary" value="Registrar">
								            </div>
								          </form>
							      </div>
							    </div>


						</div>
					</div>

		</div>
	</div>









	<?php include(OVERALL.'footer.php'); ?>


  <!-- ventanas modales -->

    <div class="modal fade in" id="modalBarrio">
    	<div class="modal-dialog">
    		<div class="modal-content ">
    			<div class="modal-header bg-primary text-white">
    				<h3 align="center">Nuevo barrio</h3>
    			</div>
    			<div class="modal-body">
    			<div class="form-group" id="rta-barrio">

    			</div>

    			<div class="form-group">

    			<label>Departamento</label>
    				<select class="custom-select form-control" name="departamento" id="departamento1" onchange="validarformulario('departamento1');">

					</select>

    			</div>
    			<div class="form-group">
    			<label>Ciudad</label>
					<select class="custom-select form-control" name="ciudad" id="ciudad1" onchange="validarformulario('ciudad1');" >
					<option selected></option>

					</select>
				</div>
				<div class="form-group">
					<label>Nuevo Barrio</label>
					<input type="text" name="nuevoBarrio" id="nuevoBarrio" class="form-control" onkeyup="validarformulario('nuevoBarrio');">

				</div>
				<span class="msg"></span>


    			</div>
    			<div class="modal-footer">

    				<input type="button" name="registrarBarrio" id="registrarBarrio" class="btn btn-md btn-info" value="Registrar">
    			</div>
    		</div>
    	</div>
    </div>

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
					<input type="text" name="nuevaEps" id="nuevaEps" class="form-control" onkeyup="validarformulario('nuevaEps');">

				</div>
					<span class="msg"></span>
				</div>

				<div class="form-group">
				<div>
					<label>Telefono</label>
					<input type="number" name="telEps" id="telEps" class="form-control" onkeyup="validarformulario('telEps');">
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



    <?php include(OVERALL.'footer.html'); ?>
    <script src="<?=VAPP.'js/superlistaCombo.js'; ?>">  </script>
    <script src="<?=VAPP.'js/superregistroalumno.js'; ?>">  </script>


    <script type="text/javascript">
    

    $(document).ready(function(){

      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>



  </body>
</html>

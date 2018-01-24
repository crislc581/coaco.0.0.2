<?php
require(CMODELO.'Alumno.php');
require(CMODELO.'observador.php');
require(CCONTROL.'superlistarcombos.php');
require(CMODELO.'matricula.php');
$GLOBALS['ob'] = new Observador();
$html ="";


function _rta($valor,$msg){
  $rt = json_encode(array("estado"=>$valor, "msg"=>$msg ));
  return $rt;
}

function addMatricula($post){
  $html=null;

  $v1=$post['documento'];
  $v2=sp($post['tipDocumento']);
  $v3=sp($post['genero']);
  $v4=sp($post['nombres']);
  $v5=sp($post['apellidos']);
  $v6=sp($post['fecNacimiento']);
  $v7=sp($post['m_jornada']);
  $v8=sp($post['email']);
  $v9=sp($post['celular']);
  $v10=sp($post['eps']);
  $v12=sp($post['telFijo']);
  $v13=sp($post['direccion']);
  $v14=sp($post['barrio']);
  $v15=sp($post['nomAcu']);
  $v16=sp($post['apelAcu']);
  $v17=sp($post['celAcu']);
  $v18=sp($post['fijoAcu']);
  $v19=sp($post['emailAcu']);
  $v20=sp($post['nomMad']);
  $v21=sp($post['apelMad']);
  $v22=sp($post['celMad']);
  $v23=sp($post['fijoMad']);
  $v24=sp($post['emailMad']);
  $v25=sp($post['nomPad']);
  $v26=sp($post['apelPad']);
  $v27=sp($post['celPad']);
  $v28=sp($post['fijoPad']);
  $v29=sp($post['emailPad']);
  $v30=sp($post['m_sede']);
  $v31=sp($post['rh']);
  $v32=sp($post['docPad']);
  $v33=sp($post['docMad']);
  $v34=sp($post['tipDocPad']);
  $v35=sp($post['tipDocMad']);
  $v36=sp($post['curso']);
  $v37=(int)sp($post['m_aniocursado']); //años cursados
  $v38=sp($post['gradosr']);      //años repetidos
  $v39=sp($post['m_aniomatricular']);
  // La id del alumno esta en la parte de abajo en las validaciones de la subida de la imagen
  $id_alumno = sp($post['id_hidden']);



  $ruta =  $_POST['rutaimagentemporal'];

  $modelo1=new Matricula();
  if($modelo1->validarMatricula($id_alumno,$v39)==10){
    return $html=2;
    exit(); //usuario
  }

  if(isset($_FILES['foto']) && $_FILES['foto']['name'] !=""){

    $v11=$_FILES['foto'];
    $nomOriginal = $v11['name'];
    $peso = $v11['size'];
    $tipo = $v11['type'];
    $nomtemporal = $v11['tmp_name'];
    $max = 2000000;
    $ruta = RUTALINUX."view/app/imagenes/Thumbnail/".$nomOriginal;
      if ($peso>$max) {
        //el tamaño de la imagen es demasiada
        $html=8;
      }else if($tipo=="image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
        
        if (!move_uploaded_file($nomtemporal, $ruta)) {  /*error aca por utlizar linux, error de la ruta del servidor no es la misma paealinux en window si funciona*/
          //cuando no se guarda la imagen
          $html=7;
        }else{
           $ruta ="view/app/imagenes/Thumbnail/".$nomOriginal;
          $GLOBALS['ob']->setId($id_alumno);
          $GLOBALS['ob']->setAlumno($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$ruta,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29,$v30,$v31,$v32,$v33,$v34,$v35,$v36,$v37+1,$v38,$v39);
          /*actualizamos los datos del estudiante */
          $html1=$GLOBALS['ob']->editAlumno($post['id_hidden']);
          $modelo=new Matricula();
          /*insertamos nuev amatricula en la tabla 0014amtricula*/
          $res=$modelo->addMatricula($post['m_aniomatricular'],$post['curso'],$post['id_hidden'],$post['m_sede'],$post['m_jornada'],$post['gradosr']);
          $html =  $res*$html1;
        }

      }
  }else{
    $GLOBALS['ob']->setId($id_alumno);
    $GLOBALS['ob']->setAlumno($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$ruta,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29,$v30,$v31,$v32,$v33,$v34,$v35,$v36,$v37+1,$v38,$v39);
    /*actualizamos los datos del estudiante */
    $html=$GLOBALS['ob']->editAlumno($post['id_hidden']);
    $modelo=new Matricula();
    /*insertamos nuev amatricula en la tabla 0014amtricula*/
    $res=$modelo->addMatricula($post['m_aniomatricular'],$post['curso'],$post['id_hidden'],$post['m_sede'],$post['m_jornada'],$post['gradosr']);
    $html =  $res;
  }

  return $html;
}

//try {
  // throw new Exception("Se ha generado un error");
  switch (isset($_GET['accion']) ? $_GET['accion'] : NULL ) {

    case 'buscarinformacion':
      $data = $GLOBALS['ob']->likeListarEstudiantesSistema(sp($_POST['valor']));
      if (count($data) >  0) {
        /*Hay datos*/
        foreach ($data as $clave) {
          $html .= '<div class="col-md-6 ">
                        <a href="#" class="enlace-alumno">
                          <div class="row mb-3 class-hijo" style="margin:0.09em;box-shadow:1px 1px 5px rgba(0,0,0,.3)">
                            <div class="col-sm-2 col-md-3" style="padding-left:0px;">
                              <img src="'.$clave['000foto'].'" alt="Foto de alumno">
                            </div>
                            <div class="col-sm-8 col-md-9">
                              <div class="row c-c-info-a">
                                <div class="col-sm-12" style="font-size:10px;">
                                <span>Tipo Doc : '.$clave['0019desTipo'].' </span> | <span> N° Doc: '.$clave['000documento'].'</span>
                                </div>
                                <div class="col-sm-12" >
                                  <strong><span >'.ucfirst($clave['000nombres']).'   '.ucfirst($clave['000apellidos']).'</span></strong><br>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <input type="hidden" class="id_estudiante_php" value="'.$clave["000id"].'" >
                      </div>';
        }
        echo _rta(true,$html);
      }else{
        echo _rta(false,"notData");
      }
      break;

    case 'informaciondelalumno':
      // Aca listamos la informacion del alumno mas actualizado del sistema duarnte le año.


     $data = $GLOBALS['ob']->listarInformacionParaEditarElAlumno(sp($_POST['id_alumno']));
        
     ?>

                    <form action="" method="post" enctype="post" id="frmatriculalumno" class="frm-mi">
                      <input type="hidden" name="id_hidden" value="<?=$data['000id']; ?>">
                      <!-- <h3>Datos del estudiante</h3>
                      <hr> -->

                      <div class="form-group" id="addAlumno"></div>

                      <div class="row">
                        <div class="col-md-12" style="text-align: center; margin: 20px; ">
                        <span id="vista_previa">
                          <img src="<?=$data['000foto']; ?>" height="80" width="80" style="border-radius: 50%;" >
                        </span>
                          <div>
                            <label class="custom-file" style="margin: 20px;">
                              <input type="file" id="foto__"  class="custom-file-input custom-file-input-sm" name="foto">
                              <input type="hidden" name="rutaimagentemporal" value="<?=$data['000foto']; ?>">
                              <span class="custom-file-control"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <a href="#" class="btn bg-light btn-block" style="color:grey; font-size: 20px; text-align: left;" id="ver_informacion_matricula">Deligenciar nueva matricula <i class="fa fa-sort-desc icon-derecha-plus" ></i></a>
                          <div id="info_matricula">
                            <br>
                            <div class="col-md-12">
                                <div class="row">




                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <select class="custom-select" id="m_sede" name="m_sede">
                                              <option value="0">Seleccione una sede </option>
                                              <?php lisSede(); ?>
                                            </select>
                                          <span class=" derecha"></span>
                                        </div>
                                        <span class="msg"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-chevron-circle-right"></i></span>
                                            <select class="custom-select" id="m_jornada" name="m_jornada" >
                                              <option value="0">Seleccione la jornada</option>
                                              <?php lisJornada(); ?>
                                            </select>
                                          <span class=" derecha"></span>
                                        </div>
                                        <span class="msg"></span>
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="">Grados cursados</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                          <input value="<?=$data['000aniosCursados']; ?>" type="number" class="form-control form-control-sm " placeholder="Grados cursados" data-toggle="tooltip" title="Grados cursados" id="m_aniocursado" name="m_aniocursado" >
                                          <span class="derecha"></span>
                                        </div>
                                        <span class="msg"></span>
                                      </div>

                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="">Grados repetidos</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                         <input value="<?=$data['000gradosRepetidos']; ?>" type="number" class="form-control form-control-sm " placeholder="Grados repetidos" data-toggle="tooltip" title="Grados repetidos" id="gradosr" name="gradosr" onkeyup="validarformulario('gradosr');">
                                          <span class=" derecha"></span>
                                                </div>
                                        <span class="msg"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="#">Año a cursar</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                      
                                          <select name="m_aniomatricular" class="custom-select" id="m_aniomatricular" >
                                              <option value=""></option>
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

                                    <div class="col-md-6">

                                      <div class="form-group">
                                        <label for="">Grado a cursar</label>
                                        <div class="input-group" >
                                          <span  class="input-group-addon "><i class="fa fa-address-book" ></i></span>
                                            <select class="custom-select" id="curso" name="curso" >
                                            <option value=""></option>
                                              <?php lisCursos();   ?>
                                            </select>
                                          <span class=" derecha"></span>
                                        </div>
                                        <span class="msg"></span>
                                      </div>
                                    </div>











                                </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- copia -->
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <a href="#" class="btn bg-light btn-block" style="color:grey; font-size: 20px; text-align: left;" id="ver_informacion_total">Información del estudiante <i class="fa fa-sort-desc icon-derecha-plus"></i></a>
                          <div class="row animated fadeIn" id="slide_up_slide_down" >
                            <div class="col-md-12">
                              <br>
                              <div class="datos_estudiantes_basicos">
                                <div class="row">
                                  <div class="col-md-6">

                                    <div class="form-group">
                                      <div class="input-group" >
                                        <span  class="input-group-addon "><i class="fa fa-user" ></i></span>
                                        <input value="<?=$data['000nombres']; ?>" type="text" class="form-control form-control-sm " placeholder="Nombre del estudiante" data-toggle="tooltip" title="Nombre del estudiante" id="nombres" name="nombres" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input value="<?=$data['000apellidos']; ?>" type="text" class="form-control form-control-sm " placeholder="Apellidos del estudiante" data-toggle="tooltip" title="Apellido del estudiante" id="apellidos" name="apellidos" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input value="<?=$data['000celular']; ?>" type="number" class="form-control form-control-sm " placeholder="Celular" maxlength="10" id="celular" data-toggle="tooltip" title="Celular del estudiante" name="celular" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input value="<?=$data['000telFijo']; ?>" type="number" class="form-control form-control-sm " placeholder="telFijo" id="telFijo" data-toggle="tooltip" title="Telefono fijo" name="telFijo" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                        <input value="<?=$data['000email']; ?>" type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Correo del alumno" data-toggle="tooltip" title="Correo del estudiante"  >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Genero</span>
                                        <select class="custom-select" id="genero" name="genero" >
                                          <option value="<?=$data['000genero']; ?>"><?=$data['001desGenero']; ?></option>
                                          <!--function php --><?php lisGenero(); ?>
                                        </select>
                                        <span class=" derecha"></span>

                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>


                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Rh</span>
                                        <select class="custom-select" name="rh" id="rh"  >
                                          <option value="<?=$data['000rh']; ?>"><?=$data['0023desRh']; ?></option>
                                          <!--function php -->  <?php lisRh(); ?>

                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Eps</span>
                                        <select class="custom-select" name="eps" id="eps" >
                                          <option value="<?=$data['000eps']; ?>"><?=$data['002desEps']; ?></option>
                                          <?php lisEps(); ?>

                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Fecha Nacimiento</span>
                                        <input value="<?=$data['000fecNacimiento']; ?>" type="date" class="form-control form-control-sm " id="fecNacimiento" name="fecNacimiento">
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Tipo documento</span>
                                        <select class="custom-select" name="tipDocumento" id="tipDocumento">
                                          <option value="<?=$data['000tipDocumento']; ?>"><?=$data['0019desTipo']; ?></option>
                                          <!--function php -->  <?=lisTD(); ?>
                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                        <input value="<?=$data['000documento']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero de documento" data-toggle="tooltip" title="Documento del estudiante" id="documento" name="documento" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                        <input value="<?=$data['000direccion']; ?>" type="text" class="form-control form-control-sm " placeholder="Direccion de la casa" data-toggle="tooltip" title="Dirección de la casa" id="direccion" name="direccion" >
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Departamento</span>
                                        <select class="custom-select" name="departamento" id="departamento" >


                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Ciudad / Municipio</span>
                                        <select class="custom-select" name="ciudad" id="ciudad" >

                                          <div id="rsp-c">

                                          </div>
                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>

                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon">Barrio</span>
                                        <select class="custom-select" name="barrio" id="barrio"  >
                                          <option value="<?=$data['000barrio']; ?>"><?=$data['0010desBarrio']; ?></option>
                                          <div id="rsp-b">

                                          </div>
                                        </select>
                                        <span class=" derecha"></span>
                                      </div>
                                      <span class="msg"></span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>


                        <div  class="form-group">
                          <a href="#"class="btn bg-light btn-block" style="color:grey; font-size: 20px; text-align: left;" id="btn_info_acudentes_padres">Datos familiares <i class="fa fa-sort-desc icon-derecha-plus"></i></a>
                          <div id="info_padres_madres">

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <small class="small">Informacion de la madre</small>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000nomMad']; ?>" type="text" class="form-control form-control-sm " data-toggle="tooltip" title="Nombre de la madre" placeholder="Nombre de la madre" id="nomMad" name="nomMad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000apelMad']; ?>" type="text" class="form-control form-control-sm " data-toggle="tooltip" title="Apellido de la madre" placeholder="Apellido de la madre" id="apelMad" name="apelMad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon">Tipo documento</span>
                                      <select class="custom-select" name="tipDocMad" id="tipDocMad">
                                        <option value="<?=$data['000tipDocMad']; ?>"><?=$data['0019desTipo']; ?></option>
                                        <!--function php --><?=lisTD(); ?>
                                      </select>
                                      <span class=" derecha"></span>
                                    </div>
                                    <span class="msg"></span>
                                  </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                      <input value="<?=$data['000docMad']; ?>" type="number" class="form-control form-control-sm " data-toggle="tooltip" title="Documento de la madre" placeholder="Numero de documento" id="docMad" name="docMad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000celMad']; ?>" type="number" class="form-control form-control-sm " data-toggle="tooltip" title="Celular de la madre" placeholder="Numero Celular" id="celMad" name="celMad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000fijoMad']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero Telefono" data-toggle="tooltip" title="Numero de telefono" id="fijoMad" name="fijoMad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input value="<?=$data['000emailMad']; ?>" type="email" class="form-control form-control-sm" name="emailMad" id="emailMad" data-toggle="tooltip" title="Correo de la madre" placeholder="Correo electronico" >
                                    <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <small class="small">Informacion del padre</small>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000nomPad']; ?>" type="text" class="form-control form-control-sm " placeholder="Nombre del padre" data-toggle="tooltip" title="Nombre del padre" id="nomPad" name="nomPad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000apelPad']; ?>" type="text" class="form-control form-control-sm " placeholder="Apellido de la Padre" data-toggle="tooltip" title="Apellido del padre" id="apelPad" name="apelPad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon">Tipo documento</span>
                                      <select class="custom-select" name="tipDocPad" id="tipDocPad" >
                                        <option value="<?=$data['000tipDocPad']; ?>"><?=$data['0019desTipo']; ?></option>
                                        <!--dnction  php --><?=lisTD(); ?>
                                      </select>
                                      <span class=" derecha"></span>
                                    </div>
                                    <span class="msg"></span>
                                  </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                      <input value="<?=$data['000docPad']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero de documento" data-toggle="tooltip" title="Numero de documento" id="docPad" name="docPad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000celPad']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero Celular" data-toggle="tooltip" title="Numero del celular" id="celPad" name="celPad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000fijoPad']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero Telefono" data-toggle="tooltip" title="Numero de telefono" id="fijoPad" name="fijoPad" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                              <input value="<?=$data['000emailPad']; ?>" type="email" class="form-control form-control-sm" name="emailPad" id="emailPad" placeholder="Correo electronico" data-toggle="tooltip" title="Correo del padre" >
                                              <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                              </div>


                              <div class="col-md-12">
                                <div class="form-group">
                                  <small class="small">Informacion del Acudiente</small>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000nomAcu']; ?>" type="text" class="form-control form-control-sm " placeholder="Nombre del acudiente" data-toggle="tooltip" title="Nombre del acudiente" id="nomAcu" name="nomAcu" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input value="<?=$data['000apelAcu']; ?>" type="text" class="form-control form-control-sm " placeholder="Apellido de la Acudiente"  data-toggle="tooltip" title="Apellido del acudiente" id="apelAcu" name="apelAcu" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>


                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000celAcu']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero Celular"  data-toggle="tooltip" title="Numero de celular" id="celAcu" name="celAcu" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                      <input value="<?=$data['000fijoAcu']; ?>" type="number" class="form-control form-control-sm " placeholder="Numero Telefono" id="fijoAcu"  data-toggle="tooltip" title="Numero de telefono" name="fijoAcu" >
                                      <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                              <input value="<?=$data['000emailAcu']; ?>" type="email" class="form-control form-control-sm" name="emailAcu" id="emailAcu" placeholder="Correo electronico"  data-toggle="tooltip" title="Correo del acudiente" >
                                              <span class=" derecha"></span>
                                  </div>
                                  <span class="msg"></span>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <a style="float: right; margin-bottom: 2em;" href="#" id="btn_click_matricular"  class="btn btn-primary col-md-4">Matricular <i class="fa fa-plus"></i></a>



                      <!-- <div class="form-group"> -->

                        <!-- <input type="button" name="enviartodo" id="enviartodo" class="btn btn-md btn-primary" value="Registrar"> -->
                      <!-- </div> -->
                    </form>



     <?php

      break;


      case 'nueva_matricula':

        break;

    case 'registrar_new_matricula_alumno':
      $info =  addMatricula($_POST);
      $info = ($info == 1) ? _rta(true,$info) : _rta(false,array("msg2"=>$info)) ;


      echo $info;

      break;



    case 'pruebaborrar':
      echo "La informacion llega por la variables get";
      break;


    default:
      // header("Location: ?view=superinicio&pagin=registrarmatricula");
      echo "Error 404 controllerMatricula.php mi error";
      break;
  }

//} catch (Exception $e) {
  //echo _rta(false,$e->getMessage());
//}



 ?>

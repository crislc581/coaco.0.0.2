<?php
require(CMODELO.'Alumno.php');
require(CMODELO.'observador.php');
require(CMODELO.'HorariosInstructor.php');
$h_ins = new HorariosInstructor();

function totalLlamadosAtencion($p){
  $modelo=new Observador();
  $total=$modelo->totalCaramelo($p);
  $gvg = count($total) > 0 ? $total[0] : "0" ;
  // $gvg = var_dump($total);
  return $gvg;
}

function listaLlamadosAtencionAnioActual($id_alum){
  $modelo=new Observador();
  $total=$modelo->allLllamadosAtencion($id_alum);
  $color = "default";
  $background = "default";
  $icon = "";
  $animacion= "";
  $html = "";
  if (count($total) > 0){
    foreach ($total as $data ):

    if ($data['3002citacion'] == "si" && $data['3002asistio'] == "no" && $data['fechacita'] >=  date('Y-m-d') ) {
      /*La citacion esta en proceso*/
      $background = "warning";
      $asistir = "En proceso ...";
      $icon = "calendar-minus-o";
      $separador = "856404";
    }else if( $data['3002citacion'] == "si" && $data['3002asistio'] == "no" && date('Y-m-d') > $data['fechacita'] ){
      /*La citacion se ha agotado*/
      $background = "danger";
      $asistir = "No";
      $icon = "calendar-times-o";
      $animacion = "animated flash";
      $separador = "721c24";
    }else if( $data['3002citacion'] == "si" && $data['3002asistio'] == "si"){
      /*El padre asistio a la citacion*/
      $background = "success";
      $asistir = "Si";
      $icon = "calendar";
      $separador = "155724";
    }else if($data['3002citacion'] == "no" && $data['3002asistio'] == "no" ){
      /*No lo citarion*/
      $background = "info";
      $asistir = "No citado";
      $icon = "calendar-minus-o";
      $separador = "0c5460";
    }

    $c = $data['3002fechacitacion'] != "" ? ucwords($data['3002fechacitacion']): "No citado";

    $html.= '
        <a href="#info_caremelo_detalles" data-toggle="modal" onclick="informacionLlamdoAtencion('.$data['3002id'].', \'  '.$background.'\' );" class="list-group-item list-group-item-'.$background.' " style="    border-bottom: 6px solid rgba(246, 246, 246, 0.9);">
          <div class="row mb-2">
            <div class="col-md-12">
              <div class=""><i class="fa fa-'.$icon.'  '.$animacion.'"> </i> Fecha de lla/atención : <strong>'.ucwords($data['3002fecha']).'</strong></div>
              <div class="dropdown-divider" style="border-top:1px solid #'.$separador.' !important"></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="info_cara">
                 <strong>Motivo :  </strong> '.ucfirst($data['3002motivo']).'
              </div>
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">

              <div>Citado: <strong>'.ucwords($data['3002citacion']).'</strong></div>
            </div>
            <div class="col-md-12">
              <div>Asistio a Citación: <strong>'.$asistir.' !</strong> </div>
            </div>
            <div class="col-md-12">
                Fecha de citacion: <strong>'.$c.'</strong>
              </div>
          </div>
         
        </a>';
     endforeach;
  }else{
      $html = "No hay ninguno";
  } //end if existen datos
  return $html;
}

function listarHorariosDeInstructorSegunElInicioSesion($id_sesion){
  global $h_ins;
  $html=null;
  //$id_sesion = isset($_SESSION['usuario'][0]) || isset($_SESSION['usuario']);
  $data = $h_ins->listarHorariosProfesor(sp($id_sesion));
  if (count($data) > 0) {
    foreach ($data as $filas) {
      $html.="<tr>";
      $html.="<td>".ucwords($filas['0026fechaDisponible'])."</td>";
      $html.="<td>".ucwords($filas['0026hora'])."</td>";
      $html.="<td>".ucwords($filas['0015desJornada'])."</td>";
      $html.="<td>".ucwords($filas['0026observacion'])."</td>";
      $html.="<tr>";

    }
    //$html = $data;
  }else{
    $html = "En el momento el instructor no tiene horarios";
  }
  return $html;
}


  switch (isset($_GET['accion'])? $_GET['accion']:null) {

      case 'buscar':
        $dato=$_POST['datos'];
        $modelo=new Observador();
        $dato=$modelo->likeObservador($dato);
        if ($dato==null) {
          echo 1;
        }else{
          for ($i=0; $i<count($dato); $i++) {
              ?>
              <div class="caja-like">
                <a href="#" class="btn_ fila_alumno_colegio" onclick="vistaObservador(<?=$dato[$i]['000id']; ?>)" style="text-decoration:none">
                  <div class="row">
                    <div class="col-sm-2">
                      <img src="<?=$dato[$i]['000foto']; ?>" height="80" width="80" alt="">
                    </div>
                    <div class="col-sm-5">
                      <div class=""><label>Apellidos: </label><span><?=$dato[$i]['000apellidos']; ?></span></div>
                      <div class=""><label>Nombres: </label><span><?=$dato[$i]['000nombres']; ?></span></div>
                    </div>
                    <div class="col-sm-5">
                      <div>Curso : <?=$dato[$i]['0020desCurso']; ?></div>
                      <div>Documento: <?=$dato[$i]['000documento']; ?></div>
                    </div>
                  </div>
                </a>
              </div>
              <?php
          }
        }
      break;

      case 'getObservador':

        include(AJAX.'datosobservador.php');
        break;

      case 'registrarcaramelo':
        try {
          $ob = new Observador();

          //info alumno

          $idEstu = sp($_POST['id_alumno']);
          $claveAlumno= encrip(sp($_POST['clave_alumno']));


          /* 1 O 10*/
          $rtaAlum = $ob->compararClaves($idEstu, $claveAlumno , "alu");


          //info de INSTRUCTOR
          // $idInstructor = isset($_SESSION['usuario'][0]) || isset($_SESSION['secretaria']) || isset($_SESSION['profesor']);
          $idInstructor = $_SESSION['usuario'][0];
          $claveInstrutor = encrip(sp($_POST['clave_instructor']));
          

          if ($ob->compararClaves($idInstructor, $claveInstrutor , "ins") == 10) {
              /*Contraseña del instructor incorrecta*/
              echo json_encode(array("estado" => false , "msg" => "pass_incorrec_ins"));
              exit;
          }


          if ($ob->compararClaves($idEstu, $claveAlumno , "alu") == 10) {
            /*contraseña del alumno incorrecta*/
              echo json_encode(array("estado" => false , "msg" => "pass_incorrec_alu"));
              exit;
          }

          //estado de citar_acudiente_opcion
          $cite = ($_POST['fechacitacion'] == "" || $_POST['fechacitacion'] == "0000-00-00" || $_POST['fechacitacion'] == "0000/00/00" ) ? "no" : "si";

          //fecha
          $fecha_de_ciracion = ($cite == "si") ? sp($_POST['fechacitacion']) : "0000/00/00";


          if ($ob->caramelo(sp($_POST['motivo']), sp($_POST['descargo']) ,sp($_POST['tipo']) ,sp($_POST['estrategia']) ,$idEstu , $idInstructor,$fecha_de_ciracion,$cite ) == 1) {




            echo json_encode(array("estado" => true , "msg" => listaLlamadosAtencionAnioActual($idEstu), "total" => totalLlamadosAtencion($idEstu) ));
          }else{
            echo json_encode(array("estado" => false , "msg" => "Error al registrar la informacion vuelva  aintentarlo"));

          }


        } catch (Exception $e) {
          echo json_encode(array("estado" => false , "msg" => "Error, ".$e->getMessage()));
        }
      break;

      case 'obtenerdatacaramelo':
        try {
          $ob1 = new Observador();
          $data = $ob1->allLlamadoAtencion(sp($_POST['id_caramelo']));
          if (count($data) > 0) {
            echo json_encode(array("estado" => true , "msg" => $data));

          }else{
            echo json_encode(array("estado" => false , "msg" => $data));
          }
        } catch (Exception $e) {
          echo json_encode(array("estado" => false , "msg" => "Error , ".$e->getMessage()));
        }
        break;


      case 'cargarpaginnewmatricula':

        include(HISUPER.'supermatricula.php');
        break;



    default:
      echo "Error observador 400 ya no se que";
      break;
  }

 ?>

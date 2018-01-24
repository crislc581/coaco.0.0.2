<?php
require_once(CMODELO.'Asistencia.php');
require_once(CMODELO.'AsistenciaSemana.php');
require_once(CMODELO.'datosAuxiliares.php');
require_once(CMODELO.'JustificacionFalla.php');
// require_once();

$GLOBALS['as'] = new Asistencia();
$GLOBALS['asSemana'] = new AsistenciaSemana();
$GLOBALS['datAuxiliares'] = new Bloque();
$justi = new JustificacionFalla();


/**
 * @return json respuesta AJAX
 */
function _rta($estado,$msg){
  return json_encode(array("estado"=>$estado,"msg"=>$msg));
}

function expploitt($data,$dat){
  $d = explode("/",$data);
  $html = $d[0];
  $ruta ="";

  if (strlen($d[0])> 0) {

    $ruta = $dat['000foto'];
    $nombre = ucwords($dat['000apellidos']." ".$dat['000nombres']);
    $falta="";

    if ($d[0] == "F") {
      $color = "danger";
      $falta = "Falla";
    }else if($d[0] == "T"){
      $falta = "Tarde";
      $color = "warning";
    }else if($d[0] == "U"){
      $falta = "Uniforme";
      $color = "info";
    }else if($d[0] == "TU"){
      $falta = "Tarde y uniforme";
      $color = "tu";
    }else if($d[0] == "E"){
      $falta = "Evacion";
      $color = "e";
    }


    $html = '<a href="#" class="btn btn-xs btn-ver-info btn-'.$color.'"> <input type="hidden" name="valores" attrid="'.$dat['000id'].'" curso="'.$dat['0020id'].'" falta="'.$falta.'" nombre="'.$nombre.'" ruta="'.$ruta.'" fecha="'.$d[1].'">'.$d[0].'</a>';
  }
  return $html;
}

function listarCursoTomarAsistencia($id_curso){
  $html ="";
  $resul=$GLOBALS['as']->listarCurso(sp($_POST['curso']));
  if ($resul  != "notData") {
    foreach ($resul as  $data) {
      $html .= '
      <tr>

        <td>'.$data['000apellidos'].'</td>
        <td>'.$data['000nombres'].'</td>

        <td><center><input class="checkbox" type="checkbox" name="tar" value="'. $data['000id'].'"></center></td>
        <td><center><input class="checkbox" type="checkbox" name="uni" value="'. $data['000id'].'"></center></td>
        <td><center><input class="checkbox" type="checkbox" name="eva" value="'. $data['000id'].'"></center></td>
        <td><center><input class="checkbox" type="checkbox" name="fal" value="'. $data['000id'].'"></center></td>
      </tr>';
    }
  }else{
    $html = 'notData';

  }


  return $html;
}

//try {
  switch (isset($_GET['acciones']) ? $_GET['acciones'] : NULL) {
    case 'buscarCurso':
      if (($msgg = listarCursoTomarAsistencia($_POST['curso'])) == "notData") {
        $msg = false;
      }else{
        $msg =true;
      }
      echo _rta($msg,$msgg);
      break;
    case 'actualizarAsistencia':

      require(AJAX.'registrarAsistencia.php');

      break;
    case 'buscarcursotomarasistencia':
      // echo "La informacion llega bien";
      //extraigo el año para seleciionar todos los cursos registros en esse año para que me lo liste en el combo box
      $vec = explode("-",sp($_POST['idsemana']));
      $data = $GLOBALS['asSemana']->listarCursosDependiendoDelAnio($vec[0]);
      if ($data != "not") {
        $html="<option selected value='0'>Seleccione un curso</option>";
        foreach ($data as $valor) {
          $html .= '<option value="'.$valor[0].'">'.$valor[1].'</option>';
        }
        echo _rta(true,$html);
      }else{
        echo _rta(false ,array("ms"=>"notData" , "anio" =>$vec[0]) );
      }
      break;
    case 'listarasistenciaporsemana':
      //print_r($_POST);
      $data = $GLOBALS['asSemana']->listarPorSemana(sp($_POST['id_sem']),sp($_POST['curso']));
      if (count($data) > 0){
        ?>
          <table class="table table-striped table-hover table-condensed table-bordered " >
                    <thead>
                    <tr class="table-info">
                      <th class="n" colspan="2" rowspan="1">Alumnos </th>
                      <th colspan="6" class="l">Lunes </th>
                      <th colspan="6" class="m">martes </th>
                      <th colspan="6" class="mi">Miercoles </th>
                      <th colspan="6" class="j">Jueves </th>
                      <th colspan="6" class="v">Viernes </th>
                    </tr>
                      <tr class="table-info">
                       <th class="n">Apellidos</th>
                       <th class="n">Nombres</th>


                       <th class="l">L1</th>
                       <th class="l">L2</th>
                       <th class="l">L3</th>
                       <th class="l">L4</th>
                       <th class="l">L5</th>
                       <th class="l">L6</th>

                       <th class="m">M1</th>
                       <th class="m">M2</th>
                       <th class="m">M3</th>
                       <th class="m">M4</th>
                       <th class="m">M5</th>
                       <th class="m">M6</th>

                       <th  class="mi">Mi1</th>
                       <th  class="mi">Mi2</th>
                       <th  class="mi">Mi3</th>
                       <th  class="mi">Mi4</th>
                       <th  class="mi">Mi5</th>
                       <th  class="mi">Mi6</th>

                       <th  class="j">J1</th>
                       <th  class="j">J2</th>
                       <th  class="j">J3</th>
                       <th  class="j">J4</th>
                       <th  class="j">J5</th>
                       <th  class="j">J6</th>

                       <th class="v">V1</th>
                       <th class="v">V2</th>
                       <th class="v">V3</th>
                       <th class="v">V4</th>
                       <th class="v">V5</th>
                       <th class="v">V6</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $valor):


                      ?>
                        <tr>
                        <input type="hidden" name="id_alumno" value="<?=$valor['000id'];?>">
                        <td class="n"><?=$valor['000apellidos']; ?></td>
                        <td class="n"><?=$valor['000nombres']; ?></td>

                        <td class="l"><?=expploitt($valor['2001lh1'],$valor); ?></td>
                        <td class="l"><?=expploitt($valor['2001lh2'],$valor); ?></td>
                        <td class="l"><?=expploitt($valor['2001lh3'],$valor); ?></td>
                        <td class="l"><?=expploitt($valor['2001lh4'],$valor); ?></td>
                        <td class="l"><?=expploitt($valor['2001lh5'],$valor); ?></td>
                        <td class="l"><?=expploitt($valor['2001lh6'],$valor); ?></td>

                        <td class="m"><?=expploitt($valor['2001mh1'],$valor); ?></td>
                        <td class="m"><?=expploitt($valor['2001mh2'],$valor); ?></td>
                        <td class="m"><?=expploitt($valor['2001mh3'],$valor); ?></td>
                        <td class="m"><?=expploitt($valor['2001mh4'],$valor); ?></td>
                        <td class="m"><?=expploitt($valor['2001mh5'],$valor); ?></td>
                        <td class="m"><?=expploitt($valor['2001mh6'],$valor); ?></td>

                        <td class="mi"><?=expploitt($valor['2001mih1'],$valor); ?></td>
                        <td class="mi"><?=expploitt($valor['2001mih2'],$valor); ?></td>
                        <td class="mi"><?=expploitt($valor['2001mih3'],$valor); ?></td>
                        <td class="mi"><?=expploitt($valor['2001mih4'],$valor); ?></td>
                        <td class="mi"><?=expploitt($valor['2001mih5'],$valor); ?></td>
                        <td class="mi"><?=expploitt($valor['2001mih6'],$valor); ?></td>

                        <td class="j"><?=expploitt($valor['2001jh1'],$valor); ?></td>
                        <td class="j"><?=expploitt($valor['2001jh2'],$valor); ?></td>
                        <td class="j"><?=expploitt($valor['2001jh3'],$valor); ?></td>
                        <td class="j"><?=expploitt($valor['2001jh4'],$valor); ?></td>
                        <td class="j"><?=expploitt($valor['2001jh5'],$valor); ?></td>
                        <td class="j"><?=expploitt($valor['2001jh6'],$valor); ?></td>

                        <td class="v"><?=expploitt($valor['2001vh1'],$valor); ?></td>
                        <td class="v"><?=expploitt($valor['2001vh2'],$valor); ?></td>
                        <td class="v"><?=expploitt($valor['2001vh3'],$valor); ?></td>
                        <td class="v"><?=expploitt($valor['2001vh4'],$valor); ?></td>
                        <td class="v"><?=expploitt($valor['2001vh5'],$valor); ?></td>
                        <td class="v"><?=expploitt($valor['2001vh6'],$valor); ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
        <?php
      }else{
        ?> <div class='alert alert-info' ><strong>Nota!</strong> No se ha tomado la asistencia en esta semana</div> <?php
      }
      break;
    case 'visualizarasistenciapordia':
      //materia
      $data = $GLOBALS['asSemana']->datosEspecificosDeUnDia(sp($_POST['fecha']) , sp($_POST['id_usu']));
      if (count($data) > 1) {
        $est =true;
        $html = $data;
      }else{
        $est = false;
        $html =  "<div class='alert alert-info fade in'><strong>Nota!</strong> No se ha tomado la asistencia en esta semana</div>";
      }

      echo _rta($est,$html);
      break;
    case 'faltasacademicasgenerales':
      $data = $GLOBALS['asSemana']->getPeriodoActual(date("Y-m-d"));
      if (count($data) > 0) {
        $html="";
        $est = true;
        foreach ($data as $periodo) {

        $html .= '<tr>
          <td>'.$periodo['0021desPeriodo'].'</td>
          <td class="count_fal">'.$GLOBALS['asSemana']->faltasFallasUniforme($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000falla" , "Falla").'</td>
          <td class="count_eva">'.$GLOBALS['asSemana']->faltasTardeEvacion($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000evasion" , "Evacion")[0][0].'</td>
          <td class="count_ret">'.$GLOBALS['asSemana']->faltasTardeEvacion($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000tarde" , "Tarde")[0][0].'</td>
          <td class="count_uni">'.$GLOBALS['asSemana']->faltasFallasUniforme($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000uniforme" , "Uniforme").'</td>
        </tr>';

         /* ECHO  $periodo['0021desPeriodo'];
          ECHO $GLOBALS['asSemana']->faltasFallasUniforme($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000falla" , "Falla");
          ECHO  $GLOBALS['asSemana']->faltasTardeEvacion($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000evasion" , "Evacion")[0][0];
          ECHO  $GLOBALS['asSemana']->faltasTardeEvacion($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000tarde" , "Tarde")[0][0];
          ECHO $GLOBALS['asSemana']->faltasFallasUniforme($periodo['2000periodo'] , date('Y-m-d') , sp($_POST['id_usu']) , "2000uniforme" , "Uniforme");
  */

        }

      }else{
        $html = "<tr><td colspan='5'>No hay regsitros en el momento</td></tr>";
        $est =false;
      }
        echo _rta($est,$html);
      break;

    case 'guardarjustificaciondefallas':


            $rr = $justi->editarFallaPorJustificacionSemanal(sp($_POST['id_alumno']),sp($_POST['fecha_inasistencia']) )->fetchAll();

            //var_dump($rr);
            //registramos en la tabla de justficacion
            $ruta = "view/app/imagenes/Thumbnail/avatardefault.png";
            if(isset($_FILES['fotexcusa']) && $_FILES['fotexcusa']['name'] !="")
            {



             // $reporte = null;

              $alum = null;

              for ($x=0; $x < count($_FILES['fotexcusa']['name']); $x++)
              {


                  $v11=$_FILES['fotexcusa'];
                  //$nomOriginal = date("Y-m-d_H:i:s")."_".$v11['name'][$x];
                  $nomOriginal = $v11['name'][$x];
                  $peso = $v11['size'][$x];
                  $tipo = $v11['type'][$x];
                  $nomtemporal = $v11['tmp_name'][$x];
                  $max = 2000000;
                  //$ruta = "view/app/imagenes/Thumbnail/".$nomOriginal; //windows

                  $rutaservidor = RUTALINUX."view/app/imagenes/Thumbnail/".$nomOriginal;


                  $ruta = "view/app/imagenes/Thumbnail/".$nomOriginal; //windows
                    if ($peso>$max)
                    {
                      //el tamaño de la imagen es demasiada
                      $alum=8;
                    }else if($tipo=="image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png")
                    {
                      $alum = 6;

                      if (!move_uploaded_file($nomtemporal, $rutaservidor)) {   //window
                      //if (!copy($nomtemporal, $ruta)) {     //linux

                        //cuando no se guarda la imagen
                        $alum=7;
                      }else{
                        $sesionprofe = $_SESSION['usuario'][0];

                        $alum=$justi->addNewJustificacion( "", sp($_POST['id_alumno']), $sesionprofe, $ruta, sp($_POST['observacionexcusa']), sp($_POST['fecha_inasistencia']), "");

                      }

                    }
                    else{

                      //tipo de archivo incorrecto
                    }
                  break;
              }
            }

            echo trim( _rta(true ,"bien"));
      break;
    case 'grafiscosAsistencia':
      break;

    default:
      echo _rta(false ,"Error 403, variable get acciones no encontrada");
      break;
  }
//} catch (Exception $e) {
 // echo _rta(false,"Error en el try call in controllerAsistencia.php , ".$e->getMessage());
//}


//  5 tardes
//  4  fallas
//  2 uniforme
//  1 evacion

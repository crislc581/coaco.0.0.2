<?php
/*/////////Definimos y declaramnos las variables del formulario/////////////*/
/**
 * @define varables del formualrio
 */
/*Arrglos*/
 $tarde =isset($_POST['tarde']) ? $_POST['tarde'] : false; /*Devuelve un arreglo con los que han sifo chequeados y como valorla id de los estudiantes*/
 $uniforme =isset($_POST['uniforme']) ? $_POST['uniforme'] : false;/*Devuelve un arreglo con los que han sifo chequeados y como valorla id de los estudiantes*/
 $evacion =isset($_POST['evacion']) ? $_POST['evacion'] : false;/*Devuelve un arreglo con los que han sifo chequeados y como valorla id de los estudiantes*/
 $falla =isset($_POST['falla']) ? $_POST['falla'] : false;/*Devuelve un arreglo con los que han sifo chequeados y como valorla id de los estudiantes*/

/*Infomracion de la clase*/
 $periodo = sp($_POST['per']); /*Periodo*/
 $curso = sp($_POST['curso']);
 $obs = sp($_POST['observacion']);
 $desclas = sp($_POST['descripClas']);
 $dia = sp($_POST['dia']); /*Periodo ejej Lunes,Martes, Mierocles*/
 $bloque = sp($_POST['bloque']); /*eje 1hora 2 , 2-3 , 4-5*/
 $block = new Bloque();
 $bloqueDescripcion = $block->getBloqueDescripcion($bloque);
 $materia = sp($_POST['materia']); /*Espol etc*/
 $sesion = $_SESSION['usuario'][0];
 //echo $sesion;
 //print_r($_SESSION['usuario']);

 /**
  * @declaramos fechass, formato como coge las fechas en los formulario html5 de los input
  */
  $actualMes= date("Y")."-".date("m"); /*Recogemos el mes */
  $actualSemana = date("Y")."-W".date("W"); /*Recogemos la semana */
  $fechaA=date("Y-m-d");

	/**
 	* @validar si el bloque con el dia actual ya se ha tomado la asistencia
	*/
 if ($GLOBALS['as']->verificarAsiDia($bloqueDescripcion,$curso)->rowCount() > 0) {

   echo _rta(false,"repitBloqueCurso");
   exit;
 }else{
   /**
    * @Registrar la asistecia de los estudiantes;, seleccionamos todo el curso y lo insertamos en la tabla asistencia de talles
    */
   // $GLOBALS['as']->setAsistenciaDetalles($a2000id,$a2000documento,$a2000documentoP,$a2000anio,$a2000mes,$a2000fecha,$a2000hora,$a2000bloque,$a2000materia,$a2000descripcion,$a2000periodo,$a2000tarde,$a2000uniforme,$a2000falla,$a2000evasion,$a2000observacion,$a2000curso);
   $GLOBALS['as']->setAsistenciaDetalles("","", sp($sesion) ,"", $actualMes, "" , "" ,$bloque, $materia, $desclas, $periodo ,"", "", "", "", $obs, $curso);

   if (!$GLOBALS['as']->registrarAsisteciaPorDia()) {
   	echo _rta( false,"errorDetalles");
   	exit;
   }
 }


 /*validamos la semana*/

if ($GLOBALS['asSemana']->verificarAsiSemana($curso,$actualSemana)->rowCount() == 0) {
  /**
  *@insertamos en en la tabla semana para actualizar despues
  */
  if (!$GLOBALS['asSemana']->registrarAsisteciaPorSemana($actualSemana,$curso,$actualMes,$periodo)){
    echo _rta(false,"errorSemana"); exit;
  }
}



 // echo _rta(true,"Uctualizamos la informacion de la asistencia");


/*Insrrtamos en la tabla semana*/
// tarde
// uniforme
// evacion
// falla
// echo $dia."\n";
$ct = 0;
$cu = 0;
$ce = 0;
$cf = 0;

    if(false != $evacion){
      foreach ($evacion as  $ide) {
        /*actualizamos en asistencia deatlles del estudiante*/
        $de=$GLOBALS['as']->updateAsistenciaDetalles('2000evasion', 'Evacion', $bloque ,$ide);
        $ce = (true  == $de) ? $ce+1 : $ce+0; /*Lleva un contador de cuantas personas evaden clase*/

        /*Asistencia semanal*/
        $GLOBALS['asSemana']->updateSemanalPorhoraDia($dia,$bloqueDescripcion,$ide,$actualSemana,"E/".$fechaA);
      } //end foreach evacion
    }//end evacion

    if(false != $falla){
      foreach ($falla as  $idf) {
        /*actualizamos en asistencia deatlles del estudiante*/
        $df=$GLOBALS['as']->updateAsistenciaDetalles('2000falla', 'Falla', $bloque ,$idf);
        $cf = (true  == $df) ? $cf+1 : $cf+0; /*Lleva un contador de cuantas personas evaden clase*/

        /*Asistencia semanal*/
        $GLOBALS['asSemana']->updateSemanalPorhoraDia($dia,$bloqueDescripcion,$idf,$actualSemana,"F/".$fechaA);
      } //end foreach evacion
    } //end falla


  	if(false != $uniforme){
  		foreach ($uniforme as  $idu) {
  			/*actualizamos en asistencia deatlles del estudiante*/
  			$du=$GLOBALS['as']->updateAsistenciaDetalles('2000uniforme', 'Uniforme', $bloque ,$idu);
  			$cu = (true  == $du) ? $cu+1 : $cu+0; /*Lleva uncontadoe de cuantas personas llegaron tarde el dia de hoy*/

  			/*Asistencia semanal*/
  			$GLOBALS['asSemana']->updateSemanalPorhoraDia($dia,$bloqueDescripcion,$idu,$actualSemana,"U/".$fechaA);
  		} //end foreach uniforme
  	} //end if uniformw


    if(false != $tarde)
    {
      foreach ($tarde as $idt)
      {
      /*actualizamos en asistencia deatlles del estudiante*/
        $dt=$GLOBALS['as']->updateAsistenciaDetalles('2000tarde', 'Tarde', $bloque ,$idt);
        $ct = (true  == $dt) ? $ct+1 : $ct+0; /*Lleva uncontadoe de cuantas personas llegaron tarde el dia de hoy*/

        /*Asistencia semanal*/
        $GLOBALS['asSemana']->updateSemanalPorhoraDia($dia,$bloqueDescripcion,$idt,$actualSemana,"T/".$fechaA);

        /*inserto todos los que tengo tarde*/
        if ($uniforme != false && false != $tarde)
        {
          foreach ($uniforme as $idu) {
            if ($idt == $idu) {
              /*actualizamos en asistencia deatlles del estudiante*/
              $du=$GLOBALS['as']->updateAsistenciaDetalles('2000uniforme', 'Uniforme', $bloque ,$idu);
              /*Asistencia semanal doble registro mismo campo*/
              $GLOBALS['asSemana']->updateSemanalPorhoraDia($dia,$bloqueDescripcion,$idt,$actualSemana,"TU/".$fechaA);
            }
          }
        }
      } //end foreach
    } //end tarde

echo _rta(true,array("estado" => true,
                     "totfal" => $cf ,
                     "toteva" => $ce ,
                     "totuni" => $cu ,
                     "tottar" => $ct ));

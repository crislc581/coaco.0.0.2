<?php 

class JustificacionFalla extends Asistencia{
	function __construct(){
		parent:: __construct();
	}




	public function addNewJustificacion($j2002id, $j2002idAlumno, $j2002idProfe, $j2002evidencia, $j2002observacion ,$j2002fechaFalla, $j2002fechaJustificada){
		$statement = $this->cn->prepare("
			INSERT INTO 2002aasistenciajustificada(2002id, 2002idAlumno, 2002idProfe, 2002evidencia,2002observacion , 2002fechaFalla, 2002fechaJustificada)
										VALUES (NULL, :2002idAlumno, :2002idProfe, :2002evidencia, :2002observacion ,:2002fechaFalla, CURRENT_DATE);
			"); 
		return $statement->execute(array(
			":2002idAlumno"=>$j2002idAlumno, 
			":2002idProfe"=>$j2002idProfe, 
			":2002evidencia"=>$j2002evidencia, 
			":2002observacion" => $j2002observacion,
			":2002fechaFalla"=>$j2002fechaFalla
			));
	}


	public function editarFallaPorJustificacionSemanal($id,$fecha){
		//datos consultar    fecha idalumno
		$fecha = "%".$fecha."%";
		$statement = $this->cn->prepare("SELECT * FROM  2001aasistenciasemana WHERE 2001idAlumno = $id AND 
						( 
							2001lh1 LIKE :fecha OR
							2001lh2 LIKE :fecha OR
							2001lh3 LIKE :fecha OR
							2001lh4 LIKE :fecha OR
							2001lh5 LIKE :fecha OR
							2001lh6 LIKE :fecha OR
							2001mh1 LIKE :fecha OR
							2001mh2 LIKE :fecha OR
							2001mh3 LIKE :fecha OR
							2001mh4 LIKE :fecha OR
							2001mh5 LIKE :fecha OR
							2001mh6 LIKE :fecha OR
							2001mih1 LIKE :fecha OR
							2001mih2 LIKE :fecha OR
							2001mih3 LIKE :fecha OR
							2001mih4 LIKE :fecha OR
							2001mih5 LIKE :fecha OR
							2001mih6 LIKE :fecha OR
							2001jh1 LIKE :fecha OR
							2001jh2 LIKE :fecha OR
							2001jh3 LIKE :fecha OR
							2001jh4 LIKE :fecha OR
							2001jh5 LIKE :fecha OR
							2001jh6 LIKE :fecha OR
							2001vh1 LIKE :fecha OR
							2001vh2 LIKE :fecha OR
							2001vh3 LIKE :fecha OR
							2001vh4 LIKE :fecha OR
							2001vh5 LIKE :fecha OR
							2001vh6 LIKE :fecha 

						)");
		$statement->execute(array("fecha" => $fecha));
		
		return $statement;
	}
}
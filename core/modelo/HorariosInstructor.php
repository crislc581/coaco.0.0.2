<?php

class HorariosInstructor{
	private $cn ;
	//$h0026id, $h0026profesor, $h0026curso, $h0026fechaDisponible, $h0026hora, $h0026jornada, $h0026observacion,
	
	private $h0026id; 
	private $h0026profesor; 
	private $h0026curso; 
	private $h0026fechaDisponible; 
	private $h0026hora; 
	private $h0026jornada; 
	private $h0026observacion;
	
	public function __construct(){
		$this->cn = new Conexion();
	} 

	public function listarHorariosProfesor($h0026profesorIndice){
		$statement = $this->cn->prepare("SELECT * FROM 0026ahorarios inner join 0015ajornada on 0015id=0026jornada WHERE 0026profesor = :0026profesorIndice");
		$statement->execute(array(":0026profesorIndice"=>$h0026profesorIndice));
		$data = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $data;
	}
}
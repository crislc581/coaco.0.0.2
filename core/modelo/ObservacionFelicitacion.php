<?php 


class ObservacionFelicitacion {
	private $cn;
	private $o3001id;
	private $o3001fecha;
	private $o3001documento;
	private $o3001desFelicitacion;
	function __construct(){
		$this->cn = new Conexion();
	}

	function addNuevaFelicitacion($o3001fecha,$o3001documento,$o3001desFelicitacion){
		$statement=$this->cn->prepare("INSERT INTO 3001anotasfelicitacion(3001fecha, 3001documento, 3001desFelicitacion) VALUES (:fecha,:documento,:desFelicitacion)");
		return $statement->execute(array("fecha"=>$o3001fecha,"documento"=>$o3001documento,"desFelicitacion"=>$o3001desFelicitacion));
	}

	function listarFelicitacion(){
		
	}

	function __destruct(){
		$this->cn = null;

	}
}
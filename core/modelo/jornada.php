<?php 

	class Jornada{

		private $conexion;
		private $j0015id;
		private $j0015desJornada;

		function __construct(){

			$this->conexion=new Conexion();
		}

		function listarJornada(){
			$conexion= new Conexion();
			$m['data']=[];
			$sql="SELECT * from 0015ajornada";
			$statement=$conexion->prepare($sql);
			if($statement->execute()){
				while($fila=$statement->fetch(PDO::FETCH_ASSOC)){
					$m["data"][]=$fila;
				}
			}else{
				$m["data"]= "Error en la consulta";
			}
			$statement->closeCursor();
			return $m;

		}

		function __destruct(){
			$this->conexion=null;
		}

	}

?>
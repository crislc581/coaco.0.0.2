<?php

	class Matricula {
	private $conexion;
		function __construct(){
			$this->conexion=new Conexion();
		}

		function addMAtricula($anio,$curso,$documento,$sede,$jornada,$gradosr){

			$stmt=$this->conexion->prepare("SELECT 000aniosCursados as anios from 000aalumno where 000id=:documento");
			$stmt->execute(array("documento"=>$documento));
			$anios=$stmt->fetch()['anios'];
			$años=$anios+1;
			$stmt->closeCursor();

			//insertar en nuva matricula
			$sql="INSERT INTO 0014amatriculados(0014anio,0014curso,0014documento,0014sede, 0014jornada,0014fechaReg,0014anioActu) 
										VALUES (:anio,:curso,:documento,:sede,:jornada,CURRENT_DATE, :anio)";
			$statement=$this->conexion->prepare($sql);
			$res=$statement->execute(array("anio"=>$anio,"curso"=>$curso,"documento"=>$documento,"sede"=>$sede,"jornada"=>$jornada));
			//falta validar si ya esta matriculado el alumno
			$statement->closeCursor();
			return $res;
		}
		public function validarMatricula($id,$año){
			$statement=$this->conexion->prepare("SELECT * FROM 0014amatriculados WHERE 0014documento=:id and ( 0014anioActu = :anio OR 0014anio = :anio )");
			$statement->execute(array("id"=>$id,"anio"=>$año));
			if ($statement->rowCount()>0) {
				return 10;
			}else{
				return 2;
			}
		}

		function __destruct(){
			$this->conexion=null;
		}
	}
 ?>

<?php

class AsistenciaSemana{

	private $cn;

	private $a2001id;
    private $a2001idSemana;
    private $a2001curso;
    private $a2001mes;
    private $a2001anio;
    private $a2001idAlumno;
    private $a2001periodo;
    private $a2001lh1;
    private $a2001lh2;
    private $a2001lh3;
    private $a2001lh4;
    private $a2001lh5;
    private $a2001lh6;
    private $a2001mh1;
    private $a2001mh2;
    private $a2001mh3;
    private $a2001mh4;
    private $a2001mh5;
    private $a2001mh6;
    private $a2001mih1;
    private $a2001mih2;
    private $a2001mih3;
    private $a2001mih4;
    private $a2001mih5;
    private $a2001mih6;
    private $a2001jh1;
    private $a2001jh2;
    private $a2001jh3;
    private $a2001jh4;
    private $a2001jh5;
    private $a2001jh6;
    private $a2001vh1;
    private $a2001vh2;
    private $a2001vh3;
    private $a2001vh4;
    private $a2001vh5;
    private $a2001vh6;

	public function __construct(){
		$this->cn = new Conexion();
	}

	public function setAsistenciaSemana(
										$a2001id,
										$a2001idSemana,
										$a2001curso,
										$a2001mes,
										$a2001anio,
										$a2001idAlumno,
										$a2001periodo,
										$a2001lh1,
										$a2001lh2,
										$a2001lh3,
										$a2001lh4,
										$a2001lh5,
										$a2001lh6,
										$a2001mh1,
										$a2001mh2,
										$a2001mh3,
										$a2001mh4,
										$a2001mh5,
										$a2001mh6,
										$a2001mih1,
										$a2001mih2,
										$a2001mih3,
										$a2001mih4,
										$a2001mih5,
										$a2001mih6,
										$a2001jh1,
										$a2001jh2,
										$a2001jh3,
										$a2001jh4,
										$a2001jh5,
										$a2001jh6,
										$a2001vh1,
										$a2001vh2,
										$a2001vh3,
										$a2001vh4,
										$a2001vh5,
										$a2001vh6)
	{
		$this->a2001id=$a2001id;
		$this->a2001idSemana=$a2001idSemana;
		$this->a2001curso=$a2001curso;
		$this->a2001mes=$a2001mes;
		$this->a2001anio=$a2001anio;
		$this->a2001idAlumno=$a2001idAlumno;
		$this->a2001periodo=$a2001periodo;
		$this->a2001lh1=$a2001lh1;
		$this->a2001lh2=$a2001lh2;
		$this->a2001lh3=$a2001lh3;
		$this->a2001lh4=$a2001lh4;
		$this->a2001lh5=$a2001lh5;
		$this->a2001lh6=$a2001lh6;
		$this->a2001mh1=$a2001mh1;
		$this->a2001mh2=$a2001mh2;
		$this->a2001mh3=$a2001mh3;
		$this->a2001mh4=$a2001mh4;
		$this->a2001mh5=$a2001mh5;
		$this->a2001mh6=$a2001mh6;
		$this->a2001mih1=$a2001mih1;
		$this->a2001mih2=$a2001mih2;
		$this->a2001mih3=$a2001mih3;
		$this->a2001mih4=$a2001mih4;
		$this->a2001mih5=$a2001mih5;
		$this->a2001mih6=$a2001mih6;
		$this->a2001jh1=$a2001jh1;
		$this->a2001jh2=$a2001jh2;
		$this->a2001jh3=$a2001jh3;
		$this->a2001jh4=$a2001jh4;
		$this->a2001jh5=$a2001jh5;
		$this->a2001jh6=$a2001jh6;
		$this->a2001vh1=$a2001vh1;
		$this->a2001vh2=$a2001vh2;
		$this->a2001vh3=$a2001vh3;
		$this->a2001vh4=$a2001vh4;
		$this->a2001vh5=$a2001vh5;
		$this->a2001vh6=$a2001vh6;
	}

	/**
    * @return object de la consulta
    */
    public function verificarAsiSemana($curso,$semana){
        $sql="SELECT 000id,000nombres
        from 0020acurso
        inner join 0014amatriculados on 0020id=0014curso
        inner join 000aalumno on 0014documento=000id
        inner join 2001aasistenciasemana on 000id=2001idAlumno
        where 0014anioActu=CURRENT_DATE and 0014curso=:curso and 2001idSemana=:semana";
        $statement=$this->cn->prepare($sql);
        $statement->execute(array("curso"=>$curso,"semana"=>$semana));
        $statement->closeCursor();
        return $statement;
    }

    /**
    *@return bool, true se registro correctamente y false si hubo una falla en el registro
    */

		/**
		 *
		 */
    public function registrarAsisteciaPorSemana($id_semana,$curso,$mes,$periodo){
    	$sql = "
  		INSERT INTO
  		  2001aasistenciasemana(
  		    2001id,
  		    2001idSemana,
  		    2001curso,
  		    2001mes,
  		    2001anio,
  		    2001idAlumno,
  		    2001periodo

  		  )
  		SELECT
  		  NULL,
  		  :a2001idSemana,
  		  :a2001curso,
  		  :a2001mes,
  		  CURRENT_DATE,
  		  0014documento,
  		  :a2001periodo
  		FROM 0014amatriculados
            WHERE 0014anioActu = CURRENT_DATE AND 0014curso = :a2001curso AND 0014estado = 1
	  	";
	  	$statement = $this->cn->prepare($sql);
	  	return $statement->execute(array(
	  		"a2001idSemana"=>$id_semana,
	  		"a2001curso" =>$curso,
	  		"a2001mes" =>$mes,
	  		"a2001periodo" =>$periodo
	  	));
    }

	/**
	*@return bool , actualiza la asistencia por cada dia
	*/
	public function updateAsistenciaporSemanaUno($idAlumno,$idSemana,$campobd,$valorbd){
		$statement = $this->cn->prepare("UPDATE 2001aasistenciasemana SET $campobd = :valorbd WHERE 2001idSemana = :idSemana AND 2001idAlumno = :idAlumno");
		return $statement->execute(array(
			"valorbd"=>$valorbd,
			"idSemana"=>$idSemana,
			"idAlumno" => $idAlumno
		));
	}



	public function updateSemanalPorhoraDia($diaLetra,$bloqueHora,$idAlumno,$idSemana,$valorbd){
		$diaHora ="antiguo";
		switch ($diaLetra) {
		    case 'Lunes':
				if($bloqueHora == "1") $diaHora =  "2001lh1";
		    	if($bloqueHora == "2") $diaHora =  "2001lh2";
		    	if($bloqueHora == "1-2") $diaHora =  array("2001lh1","2001lh2");
		    	if($bloqueHora == "3") $diaHora =  "2001lh3";
		    	if($bloqueHora == "4") $diaHora =  "2001lh4";
		    	if($bloqueHora == "3-4") $diaHora =  array("2001lh3","2001lh4");
		    	if($bloqueHora == "5") $diaHora =  "2001lh5";
		    	if($bloqueHora == "6") $diaHora =  "2001lh6";
		    	if($bloqueHora == "5-6") $diaHora =  array("2001lh5","2001lh6");
		    	if($bloqueHora == "2-3") $diaHora =  array("2001lh2","2001lh3");
		    	if($bloqueHora == "4-5") $diaHora =  array("2001lh4","2001lh5");
		    	if($bloqueHora == "1-2-3-4") $diaHora = array("2001lh1","2001lh2","2001lh3","2001lh4");
		      break;
		    case 'Martes':
		    	if($bloqueHora == "1") $diaHora = "2001mh1";
		    	if($bloqueHora == "2") $diaHora = "2001mh2";
		    	if($bloqueHora == "1-2") $diaHora = array("2001mh1","2001mh2");
		    	if($bloqueHora == "3") $diaHora = "2001mh3";
		    	if($bloqueHora == "4") $diaHora = "2001mh4";
		    	if($bloqueHora == "3-4") $diaHora = array("2001mh3","2001mh4");
		    	if($bloqueHora == "5") $diaHora = "2001mh5";
		    	if($bloqueHora == "6") $diaHora = "2001mh6";
		    	if($bloqueHora == "5-6") $diaHora = array("2001mh5","2001mh6");
		    	if($bloqueHora == "2-3") $diaHora = array("2001mh2","2001mh3");
		    	if($bloqueHora == "4-5") $diaHora = array("2001mh4","2001mh5");
		    	if($bloqueHora == "1-2-3-4") $diaHora = array("2001mh1","2001mh2","2001mh3","2001mh4");
		    	break;
		    case 'Miercoles':
		    	if($bloqueHora == "1") $diaHora = "2001mih1";
		    	if($bloqueHora == "2") $diaHora = "2001mih2";
		    	if($bloqueHora == "1-2") $diaHora = array("2001mih1","2001mih2");
		    	if($bloqueHora == "3") $diaHora = "2001mih3";
		    	if($bloqueHora == "4") $diaHora = "2001mih4";
		    	if($bloqueHora == "3-4") $diaHora = array("2001mih3","2001mih4");
		    	if($bloqueHora == "5") $diaHora = "2001mih5";
		    	if($bloqueHora == "6") $diaHora = "2001mih6";
		    	if($bloqueHora == "5-6") $diaHora = array("2001mih5","2001mih6");
		    	if($bloqueHora == "2-3") $diaHora = array("2001mih2","2001mih3");
		    	if($bloqueHora == "4-5") $diaHora = array("2001mih4","2001mih5");
		    	if($bloqueHora == "1-2-3-4") $diaHora = array("2001mih1","2001mih2","2001mih3","2001mih4");
		    	break;
		    case 'Jueves':
		    	if($bloqueHora == "1") $diaHora = "2001jh1";
		    	if($bloqueHora == "2") $diaHora = "2001jh2";
		    	if($bloqueHora == "1-2") $diaHora = array("2001jh1","2001jh2");
		    	if($bloqueHora == "3") $diaHora = "2001jh3";
		    	if($bloqueHora == "4") $diaHora = "2001jh4";
		    	if($bloqueHora == "3-4") $diaHora = array("2001jh3","2001jh4");
		    	if($bloqueHora == "5") $diaHora = "2001jh5";
		    	if($bloqueHora == "6") $diaHora = "2001jh6";
		    	if($bloqueHora == "5-6") $diaHora = array("2001jh5","2001jh6");
		    	if($bloqueHora == "2-3") $diaHora = array("2001jh2","2001jh3");
		    	if($bloqueHora == "4-5") $diaHora = array("2001jh4","2001jh5");
		    	if($bloqueHora == "1-2-3-4") $diaHora = array("2001jh1","2001jh2","2001jh3","2001jh4");
		    	break;
		    case 'Viernes':
		    	if($bloqueHora == "1") $diaHora = "2001vh1";
		    	if($bloqueHora == "2") $diaHora = "2001vh2";
		    	if($bloqueHora == "1-2") $diaHora = array("2001vh1","2001vh2");
		    	if($bloqueHora == "3") $diaHora = "2001vh3";
		    	if($bloqueHora == "4") $diaHora = "2001vh4";
		    	if($bloqueHora == "3-4") $diaHora = array("2001vh3","2001vh4");
		    	if($bloqueHora == "5") $diaHora = "2001vh5";
		    	if($bloqueHora == "6") $diaHora = "2001vh6";
		    	if($bloqueHora == "5-6") $diaHora = array("2001vh5","2001vh6");
		    	if($bloqueHora == "2-3") $diaHora = array("2001vh2","2001vh3");
		    	if($bloqueHora == "4-5") $diaHora = array("2001vh4","2001vh5");
		    	if($bloqueHora == "1-2-3-4") $diaHora = array("2001vh1","2001vh2","2001vh3","2001vh4");
		    	break;

		    default:
		    	$diaHora = "no";
		      break;
		}


		if (count($diaHora) == 1) {
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora,$valorbd);
		}else if(count($diaHora) == 2){
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[0],$valorbd);
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[1],$valorbd);

		}else if(count($diaHora) == 4){
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[0],$valorbd);
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[1],$valorbd);
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[2],$valorbd);
			$this->updateAsistenciaporSemanaUno($idAlumno,$idSemana,$diaHora[3],$valorbd);

		}

	}




	public function listarCursosDependiendoDelAnio($anio){

		$statement = $this->cn->prepare("SELECT 0014curso, 0020desCurso FROM 0014amatriculados INNER JOIN 0020acurso ON 0020id = 0014curso WHERE 0014anioActu = :anio GROUP BY 0014curso");
     	$statement->execute(array("anio" => $anio));
     	$data = $statement->rowCount()>0 ? $statement->fetchAll() : "not" ;
     	$statement->closeCursor();
     	return $data;
	}

	public function listarPorSemana($semana,$curso){
		$statement=$this->cn->prepare("SELECT * from 0020acurso inner join 2001aasistenciasemana on 0020id=2001curso inner join 000aalumno on 2001idAlumno=000id where 2001idSemana=:semana and 0020id=:curso");
		$statement->execute(array("semana"=>$semana,"curso"=>$curso));
		$statement1=$statement->fetchAll();
		$statement->closeCursor();
		return $statement1;

	}



	public function datosEspecificosDeUnDia($fecha , $id_alu){
		$statement = $this->cn->prepare("SELECT * FROM 000aalumno
			INNER JOIN 2000aasistenciadetalles ON  2000documento = 000id
			INNER JOIN 0020acurso ON 0020id = 2000curso
			INNER JOIN 008adirectivas ON 008id = 2000documentoP
			INNER JOIN 0018abloque ON 0018id = 2000bloque
			INNER JOIN 0016amateria ON 0016id = 2000materia
			WHERE 2000fecha = :fecha AND 2000documento = :idalu");
		$statement->execute(array("fecha" => $fecha , "idalu" => $id_alu));
		$data = $statement->fetchAll();
		$statement->closeCursor();
		return $data;
	}


	public function faltasAcademicas($periodo , $anio , $id_alu , $falta , $valor){
									// id      sistema  id      (2000tarde,2000uniforme,2000falla , 2000evasion)          (Tarde,Falla,Uniforme,Evacion)
		$statement = $this->cn->prepare("SELECT * FROM 2000aasistenciadetalles
					WHERE 2000periodo = :periodo AND 2000anio = :fecha AND 2000documento = :idusu AND $falta = :valor");

	}

	public function faltaAcademicaPorGeneral(){

	}

	public function faltasFallasUniforme($periodo , $anio , $idusus , $campo , $valor){
		$statement = $this->cn->prepare("SELECT * FROM 2000aasistenciadetalles
					WHERE 2000periodo = :periodo AND 2000anio = :anioo AND
					2000documento = :idusu AND $campo = :valor GROUP BY 2000fecha ");
		$statement->execute(array("periodo" => $periodo, "anioo" => $anio , "idusu" => $idusus , "valor" => $valor) );
		$data=$statement->rowCount();
		$statement->closeCursor();
		return $data;
	}

	public function faltasTardeEvacion($periodo , $anio , $idusus , $campo , $valor){
		$statement = $this->cn->prepare("SELECT COUNT(*) as 'total' FROM 2000aasistenciadetalles
					WHERE 2000periodo = :periodo AND 2000anio = :anioo AND
					2000documento = :idusu AND $campo = :valor ");
		$statement->execute(array("periodo" => $periodo, "anioo" => $anio , "idusu" => $idusus , "valor" => $valor) );
		$data= $statement->fetchAll();
		$statement->closeCursor();
		return $data;
	}

	public function getPeriodoActual($anio){
		$statement = $this->cn->prepare("SELECT 2000periodo , 0021desPeriodo FROM 2000aasistenciadetalles INNER JOIN 0021aperiodo  ON 2000periodo = 0021id WHERE 2000anio = :anio GROUP BY 2000periodo");
		$statement->execute(array("anio" => $anio));
		$data=$statement->fetchAll();
		$statement->closeCursor();
		return $data;
	}

	public function __destruct(){
		$this->cn = null;
	}
}

//SELECT * FROM 2000aasistenciadetalles
//WHERE 2000periodo = 1 AND 2000anio = CURRENT_DATE AND 2000documento = 3 AND (2000tarde = 'Tarde' OR 2000uniforme = 'Uniforme' OR 2000falla = 'Falla' OR 2000evasion = "Evacion")

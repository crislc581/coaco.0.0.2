<?php 

class NotasDefinitivas{

	private $n1014id;
    private $n1014codigoalumno;
    private $n1014curso;
    private $n1014periodo;
    private $n1014cantidadmaterias;
    private $n1014fecha;
    private $cn;

	function __construct(){
		$this->cn = new Conexion();		
	}

	function setAll($n1014codigoalumno,$n1014curso,$n1014periodo,$n1014cantidadmaterias,$n1014fecha){
	    $this->n1014codigoalumno = $n1014codigoalumno;
	    $this->n1014curso = $n1014curso;
	    $this->n1014periodo = $n1014periodo;
	    $this->n1014cantidadmaterias = $n1014cantidadmaterias;
	    $this->n1014fecha = $n1014fecha;
	}

	function setId(){

	}

	function validateDataExistsEnBd( $dataArray ){
		$estado = null;
		$statement = $this->cn->prepare( "SELECT * FROM 1014anotasdefinitivas WHERE 
																			  1014codigoalumno = :1014codigoalumno AND 
																			  1014curso = :1014curso  AND
																			  1014periodo = :n1014periodo AND
																			  YEAR(1014fecha) = :n1014fecha" );
		if($statement->execute(array(
			 ":1014codigoalumno" =>  $dataArray[0],
			 ":1014curso" =>  $dataArray[1],
			 ":n1014periodo" =>  $dataArray[2],
			 ":n1014fecha" =>  $dataArray[3]
		))){
			$estado= $statement->fetch( PDO::FETCH_ASSOC );
			if($statement->rowCount() > 0){
				$estado=true ;
			}else{
				$estado=false ;
			}
		}
		$statement->closeCursor();
		return $estado;
	}

	function newReporte(){
		$estado=null;
		$statement= $this->cn->prepare('INSERT INTO 1014anotasdefinitivas( 1014codigoalumno, 1014curso, 1014periodo, 1014cantidadmaterias, 1014fecha) VALUES 
																		(  :1014codigoalumno, :1014curso, :1014periodo, :1014cantidadmaterias, :1014fecha ) ');
		if($statement->execute(array(
				':1014codigoalumno' => $this->n1014codigoalumno,
			    ':1014curso' => $this->n1014curso,
			    ':1014periodo' => $this->n1014periodo,
			    ':1014cantidadmaterias' => $this->n1014cantidadmaterias,
			    ':1014fecha' => $this->n1014fecha
			))){
			$estado = true;
		}
		$statement->closeCursor();
		return $estado;
	}

	function verifiDocumentoStuduent($documento){
		$estado=null;
		$statement=$this->cn->prepare( "SELECT 000documento FROM 000aalumno  WHERE 000documento = :000documento LIMIT 1" );
		if( $statement->execute(array(":000documento"=>$documento)) ){
			if($statement->rowCount() > 0){
				$estado=true;
			}else{
				$estado=false;
			}
		}
		$statement->closeCursor();
		return $estado;
	}	


	function __destruct(){
		$this->cn = null;
	}

}
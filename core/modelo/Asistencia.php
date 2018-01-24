<?php

class Asistencia{

  protected $cn;

  private $a2000id;
  private $a2000documento;
  private $a2000documentoP;
  private $a2000anio;
  private $a2000mes;
  private $a2000fecha;
  private $a2000hora;
  private $a2000bloque;
  private $a2000materia;
  private $a2000descripcion;
  private $a2000periodo;
  private $a2000tarde;
  private $a2000uniforme;
  private $a2000falla;
  private $a2000evasion;
  private $a2000observacion;
  private $a2000curso;



  public function __construct(){
    $this->cn = new Conexion();
  }

  public function listarCurso($curso){
    $sql = "SELECT * FROM 0020acurso
            INNER JOIN 0014amatriculados  ON 0014curso = 0020id
            INNER JOIN 000aalumno ON 000id = 0014documento
            WHERE 0014curso = :id_curso  AND 0014estado = 1 AND 0014anioActu = CURRENT_DATE";
    $statement = $this->cn->prepare($sql);
    $statement->execute(array("id_curso" => $curso));
    if ($statement->rowCount() > 0) {
      $msg = $statement->fetchAll();
    }else{
      $msg = "notData";
    }
    $statement->closeCursor();
    return $msg;
  }

 
  /**
   * @return OBJETO CON LA LA INFORMACION DEL LA CONSULTA , verificamos so la asistencia por cada hora ya se ha tomado
  */
  public function setAsistenciaDetalles($a2000id,$a2000documento,$a2000documentoP,$a2000anio,$a2000mes,$a2000fecha,$a2000hora,$a2000bloque,$a2000materia,$a2000descripcion,$a2000periodo,$a2000tarde,$a2000uniforme,$a2000falla,$a2000evasion,$a2000observacion,$a2000curso){
   /*Id del estudiante*/
   /*Martes, mierco*/
   $this->a2000id = $a2000id;
   $this->a2000documento = $a2000documento;
   $this->a2000documentoP = $a2000documentoP;
   $this->a2000anio = $a2000anio;
   $this->a2000mes = $a2000mes;
   $this->a2000fecha = $a2000fecha;
   $this->a2000hora = $a2000hora;
   $this->a2000bloque = $a2000bloque;
   $this->a2000materia = $a2000materia;
   $this->a2000descripcion = $a2000descripcion;
   $this->a2000periodo = $a2000periodo;
   $this->a2000tarde = $a2000tarde;
   $this->a2000uniforme = $a2000uniforme;
   $this->a2000falla = $a2000falla;
   $this->a2000evasion = $a2000evasion;
   $this->a2000observacion = $a2000observacion;
   $this->a2000curso = $a2000curso;
  }

  public function verificarAsiDia($bloque,$curso){
    $consulta ="";  
    if (strlen($bloque) == 1){
      $consulta = " 0018desBloque like '%$bloque%' ";
    }else if(strlen($bloque) == 3){

      $nblo = explode("-",$bloque);
      $i = $nblo[0];
      $f = $nblo[1];
      $consulta = " (0018desBloque like '%$i%' OR  0018desBloque like '%$f%') ";

    }else if(strlen($bloque) == 7){
      $nblo = explode("-",$bloque);
      $i = $nblo[0];
      $i1 = $nblo[1];
      $i2 = $nblo[2];
      $f = $nblo[3];
      $consulta = " (0018desBloque like '%$i%' OR  0018desBloque like '%$i1%' OR 0018desBloque like '%$i2%' OR  0018desBloque like '%$f%') ";

    }
    
    
    $sql="SELECT 000id,000nombres
     from 0020acurso 
      inner join 0014amatriculados on 0020id=0014curso 
      inner join 000aalumno on 0014documento=000id 
      inner join 2000aasistenciadetalles on 2000documento=000id 
      inner join 0018abloque on 2000bloque=0018id 
      where 0014anioActu=CURRENT_DATE and 0014curso=:curso and 2000fecha=CURRENT_DATE 
      and $consulta";
      $statement=$this->cn->prepare($sql);
      $statement->execute(array("curso"=>$curso));
      return $statement;
  }


  /**
  *@return bool, true si se registro, false si fallo la sistencia
  */
  public function registrarAsisteciaPorDia(){

    /*Inner join entre directivas alumnos y matriculados*/
    $statement=$this->cn->prepare("INSERT INTO 2000aasistenciadetalles(2000id, 2000documento, 2000documentoP, 2000anio, 2000mes, 2000fecha, 2000hora, 2000bloque, 2000materia, 2000descripcion, 2000periodo, 2000tarde, 2000uniforme, 2000falla, 2000evasion, 2000observacion , 2000curso)  
                                                                 SELECT null ,0014documento ,  :a2000documentoP  , CURRENT_DATE , :a2000mes , CURRENT_DATE , CURRENT_TIME , :a2000bloque, :a2000materia, :a2000descripcion, :a2000periodo, :a2000tarde, :a2000uniforme, :a2000falla, :a2000evasion, :a2000observacion, :a2000curso 
                                                                                      
                                                            FROM 0014amatriculados 
                                                            WHERE 0014anioActu = CURRENT_DATE AND 0014curso = :a2000curso AND 0014estado = 1");




    $data = $statement->execute(array(
      // ":a2000id"=>$this->a2000id,AUto
      // ":a2000documento"=>$this->a2000documento), /*Selecciona de tabla auotmatico con la consulta*/
      ":a2000documentoP"=>$this->a2000documentoP,
      // ":a2000anio"=>$this->a2000anio,/*Automatico del sistema*/
      ":a2000mes"=>$this->a2000mes,
      // ":a2000fecha"=>$this->a2000fecha, /*Automatico del sistema*/
      // ":a2000hora"=>$this->a2000hora, /*Automatico del sistema*/
      ":a2000bloque"=>$this->a2000bloque, 
      ":a2000materia"=>$this->a2000materia,
      ":a2000descripcion"=>$this->a2000descripcion,
      ":a2000periodo"=>$this->a2000periodo,
      ":a2000tarde"=>$this->a2000tarde,
      ":a2000uniforme"=>$this->a2000uniforme,
      ":a2000falla"=>$this->a2000falla,
      ":a2000evasion"=>$this->a2000evasion,
      ":a2000observacion"=>$this->a2000observacion,
      ":a2000curso"=>$this->a2000curso
    ));
    return $data; 
  }

  public function updateAsistenciaDetalles($campo, $valor, $bloque ,$id_alu){
    $sql = "UPDATE 2000aasistenciadetalles SET $campo = :valor WHERE 2000documento = :id_alumno AND 2000bloque = :bloque AND 2000fecha = CURRENT_DATE";
    $statement = $this->cn->prepare($sql);
    return $statement->execute(array(":valor" => $valor , ":bloque" => $bloque, ":id_alumno" => $id_alu));
  }


  
  public function __destruct(){
    $this->cn = null;
  }
}

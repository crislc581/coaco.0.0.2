<?php

  class Observador extends Alumno{

    function __construct(){
      /**
       * @type constructor
       */

      parent::__construct();

    }
    /**
     * @param string $dato
     */
    function likeObservador($dato){
      $rows=null;
     
      $statement = $this->conexion->prepare("SELECT * FROM 0020acurso
                                            INNER JOIN 0014amatriculados  ON 0014curso = 0020id
                                            INNER JOIN 000aalumno ON 000id = 0014documento
                                            INNER JOIN 0019atipdocumento ON 0019id = 000tipDocumento
                                           where 000estado=1 AND 0014anioActu = CURRENT_DATE AND  (000documento like :documento or 000nombres like :documento or 000apellidos like :documento or 0020desCurso like :documento) ");
      $dato = "%$dato%";
      $statement->bindParam(":documento",$dato);
      $statement->execute();
      while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
        $rows[]=$fila;
      }        // echo $GLOBALS['ob']->getMatricula();

      $statement->closeCursor();
      return $rows;
    }

      /**
       * @return datos de los estudiantes sin curso eso significa q podemos buscar todos los estudiantes q esten registrados en el sistema y que se encuentra activos (q no etsen eliminados)
       */
        public function likeListarEstudiantesSistema($id_alumno){
          $rows=[];
          $id_alumno = "%$id_alumno%";

          $statement = $this->conexion->prepare("SELECT * FROM 0019atipdocumento
                                                  INNER JOIN 000aalumno ON 0019id = 000tipDocumento
                                                 where 000estado=1 AND  
                                                      ( 000documento like :documento 
                                                      or 000nombres like :documento 
                                                      or 000apellidos like :documento)
                                                     ");
          $statement->bindParam(":documento",$id_alumno);
          $statement->execute();
          while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
            $rows[]=$fila;
          }        // echo $GLOBALS['ob']->getMatricula();
          $statement->closeCursor();
          return $rows;

        }






    /**
     * @return int;
     */
    function allLllamadosAtencion($id_alu){
      $msg = null;

      $statement = $this->conexion->prepare("SELECT 3002id, 3002motivo, 3002descargo, 3002faltaAlManual, 3002estrategia, DATE_FORMAT(3002fecha,'%W %d de %M de %Y') as '3002fecha', 3002anio, 3002documentoE, 3002documentoP, DATE_FORMAT(3002fechacitacion,'%W %d de %M de %Y') AS '3002fechacitacion' , 3002fechacitacion AS 'fechacita',3002citacion, 3002asistio
                                            FROM 3002acaramelo
                                            INNER JOIN 000aalumno ON 000id = 3002documentoE
                                            INNER JOIN 0014amatriculados ON 0014documento = 000id
                                            WHERE 3002documentoE = :idalumno AND 0014anioActu = CURRENT_DATE  AND 3002anio = CURRENT_DATE AND 000estado=1  ORDER BY 3002fecha ASC, 3002id DESC");
      if ($statement->execute(array(":idalumno" => $id_alu))) {
        // $msg = $statement->fetch();
        while ($fila = $statement->fetch()) {
         $msg[] = $fila;
        }
      }else{
        $msg = 10;
      }
      $statement->closeCursor();
      return $msg ;
    }

    function getAllObservador($id){
      $rows=null;
    
       $statement=$this->conexion->prepare("SELECT * from 0020acurso
                                            inner join 0014amatriculados on 0020id=0014curso
                                            inner join 0022asede on 0014sede=0022id
                                            inner join 000aalumno on 0014documento=000id
                                            inner join 0015ajornada on 0014jornada=0015id
                                            inner join 002aeps on 000eps=002id
                                            inner join 0010abarrio on 000barrio=0010id
                                            inner join 0019atipdocumento on 000tipDocumento=0019id
                                            inner join 001agenero on 000genero=001id
                                            inner join 0023rh on 000rh=0023id
                                            inner join 003aestadocivil on 000estado=003id
                                           /* where 000id=:id AND 0014anioActu = CURRENT_DATE and 0014fechaReg=(select max(0014fechaReg) from 0014amatriculados WHERE  0014documento=:id  ) and 000estado=1*/
                                            where 000id=:id AND 0014anioActu = CURRENT_DATE and 000estado=1");

      


      $statement->bindParam(":id",$id);
      $statement->execute();
      $rows=$statement->fetch(PDO::FETCH_ASSOC);
      $statement->closeCursor();
      return $rows;
    }

    public function listarInformacionParaEditarElAlumno($id_alumno){
      $rows=null;

       $statement=$this->conexion->prepare("SELECT * from 002aeps
                                             
                                           
                                            inner join 000aalumno on 000eps= 002id
                                            inner join 0010abarrio on 000barrio=0010id
                                            inner join 0019atipdocumento on 000tipDocumento=0019id 
                                            inner join 001agenero on 000genero=001id
                                            inner join 0023rh on 000rh=0023id
                                            inner join 003aestadocivil on 000estado=003id
                                          
                                            where 000id=:id  and 000estado=1");

      $statement->bindParam(":id",$id_alumno);
      $statement->execute();
      $rows=$statement->fetch(PDO::FETCH_ASSOC);
      $statement->closeCursor();
      return $rows;

    }

    function compararClaves($id,$clave,$opc){
      if($opc =="alu"){
        $sql = "SELECT 000documento,007correoUsu from 000aalumno
                inner join 007ausuarios on 000documento=007nombreUsu
                where 000id=:id and 007claveUsu=:clave";
      }else if($opc == "ins"){
        $sql = "SELECT 008documento,007correoUsu from 008adirectivas inner join 007ausuarios on 008documento=007nombreUsu where 008id=:id and 007claveUsu=:clave";
      // $statement=$this->conexion->prepare($sql);
      }

      $statement = $this->conexion->prepare($sql);
      $statement->execute(array("id"=>$id,"clave"=>$clave));
      if ($statement->rowCount()>0) {
        $statement->closeCursor();
        return 1;
      }else{
        $statement->closeCursor();
        return 10;
      }

    }

    function getDocumentoAlumno($id){
      $statement = $this->conexion->prepare("SELECT 000documento FROM 000aalumno WHERE 000id= :idusu LIMIT 1");
      if ($statement->execute(array("idusu" => $id))) {
        $data = $statement->fetch();
        $msg = $data[0];
      }else{
        $msg = 10;
      }
      $statement->closeCursor();
      return $msg;
    }

    function caramelo($motivo,$descargo,$falta,$estrategia,$docuE,$docuP,$fechaCita,$cite){


      $fecha="CURRENT_DATE";
      $anio=date('Y');


      $statement=$this->conexion->prepare("INSERT INTO 3002acaramelo(3002motivo, 3002descargo, 3002faltaAlManual, 3002estrategia, 3002fecha, 3002anio, 3002documentoE, 3002documentoP, 3002fechacitacion, 3002citacion)
                                                      VALUES(:motivo,:descargo,:falta,:estrate,$fecha,:anio,:docuE,:docuP,:fechaCita , :cite)");
      $statement->bindParam(":motivo",$motivo);
      $statement->bindParam(":descargo",$descargo);
      $statement->bindParam(":falta",$falta);
      $statement->bindParam(":estrate",$estrategia);

      // $statement->bindParam(":fecha",$fecha);
      $statement->bindParam(":anio",$anio);
      $statement->bindParam(":docuE",$docuE);
      $statement->bindParam(":docuP",$docuP);
      $statement->bindParam(":fechaCita",$fechaCita);
      $statement->bindParam(":cite" , $cite);
      if($statement->execute()){
        return 1;
      }else{
        return 10;
      }


    }

    function totalCaramelo($idalumno){
      $statement = $this->conexion->prepare("SELECT count(*) FROM 3002acaramelo INNER JOIN 000aalumno ON 000id = 3002documentoE
                                            INNER JOIN 0014amatriculados ON 0014documento = 000id WHERE 3002documentoE = :idalumno
                                            AND 3002anio = '2017' AND 000estado=1 and 0014anioActu=CURRENT_DATE");
      if ($statement->execute(array("idalumno" => $idalumno))) {
        $msg = $statement->fetch();
      }else{
        $msg = 10;
      }
      $statement->closeCursor();
      return $msg;
    }

    function allLlamadoAtencion($id_alu){
      $msg = null;

      $statement = $this->conexion->prepare("SELECT 3002id, 3002motivo, 3002descargo, 3002faltaAlManual, 3002estrategia, DATE_FORMAT(3002fecha,'%W %d de %M de %Y') as '3002fecha', 3002anio, 3002documentoE, 3002documentoP, DATE_FORMAT(3002fechacitacion,'%W %d de %M de %Y') AS '3002fechacitacion', 3002fechacitacion As 'fechareali',3002citacion, 3002asistio
                                            FROM 3002acaramelo
                                            INNER JOIN 000aalumno ON 000id = 3002documentoE
                                            INNER JOIN 0014amatriculados ON 0014documento = 000id
                                            WHERE 3002id = :idcara AND 3002anio = CURRENT_DATE AND 000estado=1 ORDER BY 3002fecha ASC ");
      if ($statement->execute(array("idcara" => $id_alu))) {
        $msg = $statement->fetch();
      }else{
        $msg = 10;
      }
      $statement->closeCursor();
      return $msg ;
    }

    function __destruct(){

      parent::__destruct();

    }

  }

 ?>

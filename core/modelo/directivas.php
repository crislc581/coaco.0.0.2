<?php

  class Directivas{

    private $conexion;

    public $D008id;
    public $D008nombres;
    public $D008apellidos;
    public $D008fecNacimiento;
    public $D008genero;
    public $D008estaCivil;
    public $D008fechaIngreso;
    public $D008email;
    public $D008celular;
    public $D008eps;
    public $D008telFijo;
    public $D008direccion;
    public $D008barrio;
    public $D008nomAcu;
    public $D008apelAcu;
    public $D008celAcu;
    public $D008fijoAcu;
    public $D008jornada;
    public $D008documento;
    public $D008rol;
    public $D008tipDocumento;

    function __construct(){
      $this->conexion=new Conexion();
    }

    function SetIdDoc($id,$doc){
      $this->D008id=$id;
      $this->D008documento=$doc;
    }

    function setAll($D008nombres,$D008apellidos,$D008fecNacimiento,$D008genero,$D008estaCivil,$D008fechaIngreso,$D008email,$D008celular,$D008eps,$D008telFijo,$D008direccion,$D008barrio,$D008nomAcu,$D008apelAcu,$D008celAcu,$D008fijoAcu,$D008jornada,$D008documento,$D008rol,$D008tipDocumento){
      $this->D008nombres=$D008nombres;
      $this->D008apellidos=$D008apellidos;
      $this->D008fecNacimiento=$D008fecNacimiento;
      $this->D008genero=$D008genero;
      $this->D008estaCivil=$D008estaCivil;
      $this->D008fechaIngreso=$D008fechaIngreso;
      $this->D008email=$D008email;
      $this->D008celular=$D008celular;
      $this->D008eps=$D008eps;
      $this->D008telFijo=$D008telFijo;
      $this->D008direccion=$D008direccion;
      $this->D008barrio=$D008barrio;
      $this->D008nomAcu=$D008nomAcu;
      $this->D008apelAcu=$D008apelAcu;
      $this->D008celAcu=$D008celAcu;
      $this->D008fijoAcu=$D008fijoAcu;
      $this->D008jornada=$D008jornada;
      $this->D008documento=$D008documento;
      $this->D008rol=$D008rol;
      $this->D008tipDocumento=$D008tipDocumento;
    }
    function nuevaDirectiva(){
      $stmt=$this->conexion->prepare("SELECT * FROM 008adirectivas where 008documento=:doc");
      $stmt->execute(array("doc"=>$this->D008documento));
      if ($stmt->rowCount()>0) {
        $retorno=array( "docRepi" , $stmt->fetch() );  //documento repetido
      }else{
        $sql="INSERT INTO 008adirectivas(
            008nombres,
            008apellidos,
            008fecNacimiento,
            008genero,
            008estaCivil,
            008fechaIngreso,
            008email,
            008celular,
            008eps,
            008telFijo,
            008direccion,
            008barrio,
            008nomAcu,
            008apelAcu,
            008celAcu,
            008fijoAcu,
            008jornada, 
            008documento, 
            008rol, 
            008tipDocumento) 
            VALUES (
            :D008nombres,
            :D008apellidos,
            :D008fecNacimiento,
            :D008genero,
            :D008estaCivil,
            :D008fechaIngreso,
            :D008email,
            :D008celular,
            :D008eps,
            :D008telFijo,
            :D008direccion,
            :D008barrio,
            :D008nomAcu,
            :D008apelAcu,
            :D008celAcu,
            :D008fijoAcu,
            :D008jornada, 
            :D008documento, 
            :D008rol, 
            :D008tipDocumento);";
            $sql.="INSERT INTO 007ausuarios
            (007nombreUsu,
             007claveUsu,
             007rolUsu,
             007correoUsu) VALUES
             (:D008documento,
              :U007claveUsu,
              :D008rol,
              :D008email)";

        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":D008nombres",$this->D008nombres);
        $statement->bindParam(":D008apellidos",$this->D008apellidos);
        $statement->bindParam(":D008fecNacimiento",$this->D008fecNacimiento);
        $statement->bindParam(":D008genero",$this->D008genero);
        $statement->bindParam(":D008estaCivil",$this->D008estaCivil);
        $statement->bindParam(":D008fechaIngreso",$this->D008fechaIngreso);
        $statement->bindParam(":D008email",$this->D008email);
        $statement->bindParam(":D008celular",$this->D008celular);
        $statement->bindParam(":D008eps",$this->D008eps);
        $statement->bindParam(":D008telFijo",$this->D008telFijo);
        $statement->bindParam(":D008direccion",$this->D008direccion);
        $statement->bindParam(":D008barrio",$this->D008barrio);
        $statement->bindParam(":D008nomAcu",$this->D008nomAcu);
        $statement->bindParam(":D008apelAcu",$this->D008apelAcu);
        $statement->bindParam(":D008celAcu",$this->D008celAcu);
        $statement->bindParam(":D008fijoAcu",$this->D008fijoAcu);
        $statement->bindParam(":D008jornada",$this->D008jornada);
        $statement->bindParam(":D008documento",$this->D008documento);
        $passEncrip = encrip($this->D008documento);
        $statement->bindParam(":U007claveUsu", $passEncrip);
        //$statement->bindParam(":");
        $statement->bindParam(":D008rol",$this->D008rol);
        $statement->bindParam(":D008tipDocumento",$this->D008tipDocumento);

        $retorno=array( true , $statement->execute() );

     } 
    $stmt->closeCursor();     
    return $retorno;
    }

    function editDirectivas(){
     
      $sql = '
        UPDATE 008adirectivas SET  
        008nombres= :008nombres ,
        008apellidos= :008apellidos ,
        008fecNacimiento= :008fecNacimiento ,
        008genero= :008genero ,
        008estaCivil= :008estaCivil ,
        008email= :008email ,
        008celular= :008celular ,
        008eps= :008eps ,
        008telFijo= :008telFijo ,
        008direccion= :008direccion ,
        008barrio= :008barrio ,
        008nomAcu= :008nomAcu ,
        008apelAcu= :008apelAcu ,
        008celAcu= :008celAcu ,
        008fijoAcu= :008fijoAcu ,
        008jornada= :008jornada ,
        008documento= :008documento ,
        008rol= :008rol ,
        008tipDocumento= :008tipDocumento 
        WHERE 008id= :008id; 
      ';


      $sql.="UPDATE 007ausuarios SET 007nombreUsu= :008documento,007correoUsu= :008email, 007rolUsu= :008rol WHERE 007nombreUsu = :008documento";
     
      $statement=$this->conexion->prepare($sql);

      return $statement->execute(array(    
          ":008id"=>$this->D008id,
          ":008nombres"=>$this->D008nombres,
          ":008apellidos"=>$this->D008apellidos,
          ":008fecNacimiento"=>$this->D008fecNacimiento,
          ":008genero"=>$this->D008genero,
          ":008estaCivil"=>$this->D008estaCivil,
          ":008email"=>$this->D008email,
          ":008celular"=>$this->D008celular,
          ":008eps"=>$this->D008eps,
          ":008telFijo"=>$this->D008telFijo,
          ":008direccion"=>$this->D008direccion,
          ":008barrio"=>$this->D008barrio,
          ":008nomAcu"=>$this->D008nomAcu,
          ":008apelAcu"=>$this->D008apelAcu,
          ":008celAcu"=>$this->D008celAcu,
          ":008fijoAcu"=>$this->D008fijoAcu,
          ":008jornada"=>$this->D008jornada,
          ":008documento"=>$this->D008documento,
          ":008rol"=>$this->D008rol,
          ":008tipDocumento"=>$this->D008tipDocumento 
      ));
    }

    function eliDirectivas(){
      $sql="UPDATE 008adirectivas SET 008estado=0 WHERE 008id = :D008id ;";
          $sql .= " DELETE FROM 007ausuarios where 007nombreUsu=:D008Doc";
      $statement=$this->conexion->prepare($sql);
      return $statement->execute(array(":D008id"=>$this->D008id,":D008Doc"=>$this->D008documento));
    }

    function validateDocumentEmailExists( $documento , $correo  ){  

      $estado = array( "correo"=> array( "estado"=>null, "data"=>null ) ,"documento"=> array( "estado"=>null, "data"=>null )  );
    
      $statement = $this->conexion->prepare( " SELECT 008documento, 008email, 008nombres  FROM 008adirectivas WHERE 008documento = :documento OR 008email = :email" );
      $statement->execute( array( ":documento" => $documento, ":email" => $correo ) );

      if($statement->rowCount() > 0){
        $dataBd = $statement->fetch(PDO::FETCH_ASSOC);

         if( $dataBd['008documento'] == $documento ){  // el documento ya existe
            $estado["documento"]["estado"] ="existe";
            $estado["documento"]["data"] = $dataBd ;
         }

         if( $dataBd['008email'] == $correo ){
          $estado["correo"]["estado"] ="existe";
            $estado["correo"]["data"] = $dataBd ;
         }
       }

      $statement->closeCursor();

      
      //data que devuelve
      $estado1 = array( 
                        "correo" => array(
                                            "estado"=> "existe",
                                            "data" =>  array(
                                                              '008email' => 'pep@gamil'
                                                            )
                                          ),
                        "documento" => array(
                                            "estado"=> "existe",
                                            "data" =>  array(
                                                              '008documento' => '123454'
                                                            )
                                          )
                                            
                    );

      return $estado;
    }


    function lisDirectivas($opc=0){
      $row=null;
      if ($opc==0){
        $statement=$this->conexion->prepare("SELECT *  FROM 008adirectivas inner join 001agenero on 001id=008genero inner join 003aestadocivil on 003id=008estaCivil inner join 002aeps on 002id=008eps inner join 0010abarrio on 0010id=008barrio inner join 0019atipdocumento on 0019id=008tipDocumento inner join 009apermisos on 009id=008rol inner join 0015ajornada on 0015id=008jornada where 008estado=1 ORDER BY 008nombres ASC , 008apellidos ASC;");
        $statement->execute();
      }else{
        $statement=$this->conexion->prepare("SELECT 008id, 008nombres, 008apellidos, 008fecNacimiento, 001desGenero, 003desEsCivil, 008fechaIngreso, 008email, 008celular, 002desEps, 008telFijo, 008direccion, 0010desBarrio, 008nomAcu, 008apelAcu, 008celAcu, 008fijoAcu, 0015desJornada, 008documento, 009desUsu, 0019desTipo FROM 008adirectivas inner join 001agenero on 001id=008genero inner join 003aestadocivil on 003id=008estaCivil inner join 002aeps on 002id=008eps inner join 0010abarrio on 0010id=008barrio inner join 0019atipdocumento on 0019id=008tipDocumento inner join 009apermisos on 009id=008rol inner join 0015ajornada on 0015id=008jornada where 008estado=1 and 008documento=:doc ORDER BY 008nombres ASC , 008apellidos ASC");
        $statement->execute();
      }

      while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
      $row[]=$fila;
      }
      return $row;
    }

    function __destruct(){
    $this->conexion=null;
    }
  }

 ?>



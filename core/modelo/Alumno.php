<?php

/*
10=error en la consulta
9=ya existen los datos
8=el tamaño de la imagen es demasiada
7=cuando no se guarda la imagen
6=
5=error consulta
4=
3=
2=
1=todo esta bien

*/

	Class Alumno{

		protected $a000id;
	    protected $a000documento;
	    protected $a000tipDocumento;
	    protected $a000genero;
	    protected $a000nombres;
	    protected $a000apellidos;
	    protected $a000fecNacimiento;
	    protected $a000jornada;
	    protected $a000email;
	    protected $a000celular;
	    protected $a000eps;
	    protected $a000foto;
	    protected $a000telFijo;
	    protected $a000direccion;
	    protected $a000barrio;
	    protected $a000nomAcu;
	    protected $a000apelAcu;
	    protected $a000celAcu;
	    protected $a000fijoAcu;
	    protected $a000emailAcu;
	    protected $a000nomMad;
	    protected $a000apelMad;
	    protected $a000celMad;
	    protected $a000fijoMad;
	    protected $a000emailMad;
	    protected $a000nomPad;
	    protected $a000apelPad;
	    protected $a000celPad;
	    protected $a000fijoPad;
	    protected $a000emailPad;
	    protected $a000sede;
	    protected $a000rh;
	    protected $a000tipDocPad;
	    protected $a000tipDocMad;
	    protected $a000docMad;
	    protected $a000docPad;
	    protected $a000curso;
	    protected $a000gradosc;
	    protected $a000gradosr;
	    protected $a000matricula;
			protected $a000estado;

	    protected $conexion;

	    function __construct(){
	    	$this->conexion=new Conexion();
	    }

			function getA000documento(){
				return $this->a000documento;
			}

			function setId($id)
			{
				$this->a000id=$id;
			}



			public function getAll(){
				$m = "\n  ".$this->a000id;

				$m .= "\n  ".$this->a000documento;
				$m .= "\n  ".$this->a000tipDocumento;
				$m .= "\n  ".$this->a000genero;
				$m .= "\n  ".$this->a000nombres;
				$m .= "\n  ".$this->a000apellidos;
				$m .= "\n  ".$this->a000fecNacimiento;
				$m .= "\n  ".$this->a000jornada;
				$m .= "\n  ".$this->a000email;
				$m .= "\n  ".$this->a000celular;
				$m .= "\n  ".$this->a000eps;
				$m .= "\n  ".$this->a000foto;
				$m .= "\n  ".$this->a000telFijo;
				$m .= "\n  ".$this->a000direccion;
				$m .= "\n  ".$this->a000barrio;
				$m .= "\n  ".$this->a000nomAcu;
				$m .= "\n  ".$this->a000apelAcu;
				$m .= "\n  ".$this->a000celAcu;
				$m .= "\n  ".$this->a000fijoAcu;
				$m .= "\n  ".$this->a000emailAcu;
				$m .= "\n  ".$this->a000nomMad;
				$m .= "\n  ".$this->a000apelMad;
				$m .= "\n  ".$this->a000celMad;
				$m .= "\n  ".$this->a000fijoMad;
				$m .= "\n  ".$this->a000emailMad;
				$m .= "\n  ".$this->a000nomPad;
				$m .= "\n  ".$this->a000apelPad;
				$m .= "\n  ".$this->a000celPad;
				$m .= "\n  ".$this->a000fijoPad;
				$m .= "\n  ".$this->a000emailPad;
				$m .= "\n  ".$this->a000sede;
				$m .= "\n  ".$this->a000rh;
				$m .= "\n  ".$this->a000docPad;
				$m .= "\n  ".$this->a000docMad;
				$m .= "\n  ".$this->a000tipDocPad;
				$m .= "\n  ".$this->a000tipDocMad;
				$m .= "\n  ".$this->a000curso;
				$m .= "\n  ".$this->a000gradosc;
				$m .= "\n  ".$this->a000gradosr;
				$m .= "\n  ".$this->a000matricula; /**/

				return $m;
			}

	    public function setAlumno(

	    	$documento
				,$tipDocumento
				,$genero
				,$nombres
				,$apellidos
				,$fecNacimiento
				,$jornada
				,$email
				,$celular
				,$eps
				,$foto
				,$telFijo
				,$direccion
				,$barrio
				,$nomAcu
				,$apelAcu
				,$celAcu
				,$fijoAcu
				,$emailAcu
				,$nomMad
				,$apelMad
				,$celMad
				,$fijoMad
				,$emailMad
				,$nomPad
				,$apelPad
				,$celPad
				,$fijoPad
				,$emailPad
				,$sede
				,$rh
				,$docPad
				,$docMad
				,$tipDocPad
				,$tipDocMad
				,$curso
				,$gradosc
				,$gradosr
				,$matricula){


				$this->a000documento=$documento;
				$this->a000tipDocumento=$tipDocumento;
				$this->a000genero=$genero;
				$this->a000nombres=$nombres;
				$this->a000apellidos=$apellidos;
				$this->a000fecNacimiento=$fecNacimiento;
				$this->a000jornada=$jornada;
				$this->a000email=$email;
				$this->a000celular=$celular;
				$this->a000eps=$eps;
				$this->a000foto=$foto;
				$this->a000telFijo=$telFijo;
				$this->a000direccion=$direccion;
				$this->a000barrio=$barrio;
				$this->a000nomAcu=$nomAcu;
				$this->a000apelAcu=$apelAcu;
				$this->a000celAcu=$celAcu;
				$this->a000fijoAcu=$fijoAcu;
				$this->a000emailAcu=$emailAcu;
				$this->a000nomMad=$nomMad;
				$this->a000apelMad=$apelMad;
				$this->a000celMad=$celMad;
				$this->a000fijoMad=$fijoMad;
				$this->a000emailMad=$emailMad;
				$this->a000nomPad=$nomPad;
				$this->a000apelPad=$apelPad;
				$this->a000celPad=$celPad;
				$this->a000fijoPad=$fijoPad;
				$this->a000emailPad=$emailPad;
				$this->a000rh=$rh;
				$this->a000docPad=$docPad;
				$this->a000docMad=$docMad;
				$this->a000tipDocPad=$tipDocPad;
				$this->a000tipDocMad=$tipDocMad;


				$this->a000sede=$sede;
				$this->a000curso=$curso;
				$this->a000gradosc=$gradosc;  //grados cursados
				$this->a000gradosr=$gradosr;  //grados repetidos
				$this->a000matricula=$matricula;  /*Año a matricular */
				// es importante aclarar que el curso se le asignaen la matricula

	    }

	    public function setAddAlumno()
	    {
	    	$error=null;
	    	$sql="SELECT 000documento from 000aalumno where 000documento=:documentox ";
	    	//trae la conexion
	    	$stmt=$this->conexion->prepare($sql);
	    	//darle el valor a la mascara de la variable
	    	$stmt->bindParam(":documentox",$this->a000documento);
	    	//ejecutó la consulta
	    	$stmt->execute();
	    	if ($stmt->rowCount()>0) {
	    		//es cuando ya hay un alumno registrado
	    		$error=9;
					// $error = $this->getMatricula();

	    	}else{
	    		$sql1="INSERT INTO 000aalumno(000documento, 000tipDocumento, 000genero, 000nombres, 000apellidos, 000fecNacimiento, 000email, 000celular, 000eps, 000foto, 000telFijo, 000direccion, 000barrio, 000nomAcu, 000apelAcu, 000celAcu, 000fijoAcu, 000emailAcu, 000nomMad, 000apelMad, 000celMad, 000fijoMad, 000emailMad, 000nomPad, 000apelPad, 000celPad, 000fijoPad, 000emailPad, 000rh, 000docPad, 000docMad, 000tipDocPad, 000tipDocMad , 000aniosCursados, 000gradosRepetidos) VALUES
					 (:documento,:tipDocumento,:genero,:nombres,:apellidos,:fecNacimiento,:email,:celular,:eps,:foto,:telFijo,:direccion,:barrio,:nomAcu,:apelAcu,:celAcu,:fijoAcu,:emailAcu,:nomMad,:apelMad,:celMad,:fijoMad,:emailMad,:nomPad,:apelPad,:celPad,:fijoPad,:emailPad,:rh,:docPad,:docMad,:tipDocPad,:tipDocMad , :000aniosCursados, :000gradosRepetidos);";
					 $an=date('Y');
	    		// $sql1.= " INSERT INTO 0014amatriculados(0014id, 0014anio, 0014curso, 0014documento, 0014anioCursados, 0014sede, 0014jornada, 0014gradorepetido) values (NULL,:anio,:curso,:idalu,:anios,:sede,:jornada,:gradosr);";
				  $sql1 .= "INSERT INTO 0014amatriculados(0014id, 0014anio, 0014curso, 0014documento, 0014sede, 0014jornada, 0014fechaReg,0014anioActu)
												SELECT NULL, :anio, :curso, 000id, :sede, :jornada, CURRENT_DATE, :an FROM 000aalumno WHERE 000id=(SELECT MAX(000id) FROM  000aalumno); ";

					$sql1.=" INSERT INTO 007ausuarios(007id,007nombreUsu, 007claveUsu, 007rolUsu, 007correoUsu) values
						(null,:documento,:md5,:rol,:emailusu) ,
						(null,:documentom,:md5m,:rolm,:emailusum) ,
						(null,:documentop,:md5p,:rolp,:emailusup) ,
						(null,:documentoa,:md5a,:rola,:emailusua);";
	    		$statement=$this->conexion->prepare($sql1);

	    		//darle el valor a la mascara de la variable
	    		$statement->bindParam(":documento",$this->a000documento);
	    		$statement->bindParam(":tipDocumento",$this->a000tipDocumento);
	    		$statement->bindParam(":genero",$this->a000genero);
	    		$statement->bindParam(":nombres",$this->a000nombres);
	    		$statement->bindParam(":apellidos",$this->a000apellidos);
	    		$statement->bindParam(":fecNacimiento",$this->a000fecNacimiento);
	    		$statement->bindParam(":email",$this->a000email);
	    		$statement->bindParam(":celular",$this->a000celular);
	    		$statement->bindParam(":eps",$this->a000eps);
	    		$statement->bindParam(":foto",$this->a000foto);
	    		$statement->bindParam(":telFijo",$this->a000telFijo);
	    		$statement->bindParam(":direccion",$this->a000direccion);
	    		$statement->bindParam(":barrio",$this->a000barrio);
	    		$statement->bindParam(":nomAcu",$this->a000nomAcu);
	    		$statement->bindParam(":apelAcu",$this->a000apelAcu);
	    		$statement->bindParam(":celAcu",$this->a000celAcu);
	    		$statement->bindParam(":fijoAcu",$this->a000fijoAcu);
	    		$statement->bindParam(":emailAcu",$this->a000emailAcu);
	    		$statement->bindParam(":nomMad",$this->a000nomMad);
	    		$statement->bindParam(":apelMad",$this->a000apelMad);
	    		$statement->bindParam(":celMad",$this->a000celMad);
	    		$statement->bindParam(":fijoMad",$this->a000fijoMad);
	    		$statement->bindParam(":emailMad",$this->a000emailMad);
	    		$statement->bindParam(":nomPad",$this->a000nomPad);
	    		$statement->bindParam(":apelPad",$this->a000apelPad);
	    		$statement->bindParam(":celPad",$this->a000celPad);
	    		$statement->bindParam(":fijoPad",$this->a000fijoPad);
	    		$statement->bindParam(":emailPad",$this->a000emailPad);
	    		$statement->bindParam(":rh",$this->a000rh);
	    		$statement->bindParam(":docPad",$this->a000docPad);
	    		$statement->bindParam(":docMad",$this->a000docMad);
	    		$statement->bindParam(":tipDocPad",$this->a000tipDocPad);
	    		$statement->bindParam(":tipDocMad",$this->a000tipDocMad);
				$statement->bindParam(":000aniosCursados",$this->a000gradosc);
				$statement->bindParam(":000gradosRepetidos",$this->a000gradosr);






	    		// matricula
					$statement->bindParam(":anio",$this->a000matricula);
					$statement->bindParam(":curso",$this->a000curso);
	    		$statement->bindParam(":sede",$this->a000sede);
	    	  $statement->bindParam(":jornada",$this->a000jornada);
					// $gg = "CURRENT_DATE";
					// $statement->bindParam(":year",$gg);
					$statement->bindParam(":an",$an);


					//usuarios
					$rol=4; //== el numero 4 representa el rol de padre y estudinate para inicien session en la aplicaion
					$rol5 = 5; //password_needs_rehash$
					$rol6 = 6; //acudiente
					//login alumno
					$md5=encrip($this->a000documento); // == contraseña encriptada
					$statement->bindParam(":documento",$this->a000documento);
					$statement->bindParam(":md5",$md5);
					$statement->bindParam(":rol",$rol);
					$statement->bindParam(":emailusu",$this->a000email);

					//login madre
					$md5m=encrip($this->a000docMad); // == contraseña encriptada
					$statement->bindParam(":documentom",$this->a000docMad);
					$statement->bindParam(":md5m",$md5m);
					$statement->bindParam(":rolm",$rol5);
					$statement->bindParam(":emailusum",$this->a000emailMad);

					//login padre
					$md5p=encrip($this->a000docPad); // == contraseña encriptada
					$statement->bindParam(":documentop",$this->a000docPad);
					$statement->bindParam(":md5p",$md5p);
					$statement->bindParam(":rolp",$rol5);
					$statement->bindParam(":emailusup",$this->a000emailPad);

					//login acudienete
					$md5a=encrip($this->a000emailAcu); // == contraseña encriptada
					$statement->bindParam(":documentoa",$this->a000emailAcu);
					$statement->bindParam(":md5a",$md5a);
					$statement->bindParam(":rola",$rol6);
					$statement->bindParam(":emailusua",$this->a000emailAcu);


	    		//ejecutó la consulta

	    		if($statement->execute()){
					$error=1;
					$statement->closeCursor();
				}else{
					$error=10;
				}
				$stmt->closeCursor();
	    	}


	    	return $error;
	    }




			function getListObservador($anio,$bus){

			}

			function editAlumno($id){
				$stmt=$this->conexion->prepare("SELECT 000documento as doc from 000aalumno where 000id=:id");
				$stmt->execute(array("id"=>$id));

				if($stmt->rowCount()>0){
					$ids=$stmt->fetch()['doc'];

					$stmt->closeCursor();
					$sql="UPDATE 000aalumno SET 000documento=:documento,
						000tipDocumento=:tipDocumento,
						000genero=:genero,
						000nombres=:nombres,
						000apellidos=:apellidos,
						000fecNacimiento=:fecNacimiento,
						000email=:email,
						000celular=:celular,
						000eps=:eps,
						000foto=:foto,
						000telFijo=:telFijo,
						000direccion=:direccion,
						000barrio=:barrio,
						000nomAcu=:nomAcu,
						000apelAcu=:apelAcu,
						000celAcu=:celAcu,
						000fijoAcu=:fijoAcu,
						000emailAcu=:emailAcu,
						000nomMad=:nomMad,
						000apelMad=:apelMad,
						000celMad=:celMad,
						000fijoMad=:fijoMad,
						000emailMad=:emailMad,
						000nomPad=:nomPad,
						000apelPad=:apelPad,
						000celPad=:celPad,
						000fijoPad=:fijoPad,
						000emailPad=:emailPad,
						000rh=:rh,
						000docPad=:docPad,
						000docMad=:docMad,
						000tipDocPad=:tipDocPad,
						000tipDocMad=:tipDocMad,
						000aniosCursados=:000aniosCursados,
						000gradosRepetidos=:000gradosRepetidos
				 	WHERE 000id=:id;


					Update 007ausuarios set 007nombreUsu=:documento,007correoUsu=:email where 007nombreUsu=:iddoc";


					$statement=$this->conexion->prepare($sql);
					$res=$statement->execute(array(
						"documento"=>$this->a000documento,
						"tipDocumento"=>$this->a000tipDocumento,
						"genero"=>$this->a000genero,
						"nombres"=>$this->a000nombres,
						"apellidos"=>$this->a000apellidos,
						"fecNacimiento"=>$this->a000fecNacimiento,
						"email"=>$this->a000email,
						"celular"=>$this->a000celular,
						"eps"=>$this->a000eps,
						"foto"=>$this->a000foto,
						"telFijo"=>$this->a000telFijo,
						"direccion"=>$this->a000direccion,
						"barrio"=>$this->a000barrio,
						"nomAcu"=>$this->a000nomAcu,
						"apelAcu"=>$this->a000apelAcu,
						"celAcu"=>$this->a000celAcu,
						"fijoAcu"=>$this->a000fijoAcu,
						"emailAcu"=>$this->a000emailAcu,
						"nomMad"=>$this->a000nomMad,
						"apelMad"=>$this->a000apelMad,
						"celMad"=>$this->a000celMad,
						"fijoMad"=>$this->a000fijoMad,
						"emailMad"=>$this->a000emailMad,
						"nomPad"=>$this->a000nomPad,
						"apelPad"=>$this->a000apelPad,
						"celPad"=>$this->a000celPad,
						"fijoPad"=>$this->a000fijoPad,
						"emailPad"=>$this->a000emailPad,
						"rh"=>$this->a000rh,
						"docPad"=>$this->a000docPad,
						"docMad"=>$this->a000docMad,
						"tipDocPad"=>$this->a000tipDocPad,
						"tipDocMad"=>$this->a000tipDocMad,
						"iddoc"=>$ids,
						":000aniosCursados"=>$this->a000gradosc,
						":000gradosRepetidos" => $this->a000gradosr,
						"id"=>$id));
					$statement->closeCursor();
					return $res;
				}else{
					return 9;
				}
				//SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens
			}

		public function insertArchivoPlanoAlumno($des){
			$data=$this->conexion->prepare("INSERT INTO PRUEBABORRAR  (id_p, nombre) VALUES(NULL, :des)");
			return $data->execute(array("des"=>$des));
		}


	    function __destruct(){
	    	//destruir conexion
	    	$this->conexion=null;

	    }

	}

 ?>

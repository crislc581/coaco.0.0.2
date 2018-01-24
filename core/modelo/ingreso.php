<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Ingreso{

	private $i007id;
	private $i007nombreUsu;
	private $i007claveUsu;
	private $i007rolUsu;
	private $i007correoUsu;
	private $modelo;
	private $id;

	function __construct()
	{
		$this->modelo=new Conexion();
	}

	function recuperarClave($correo){
		$statement = $this->modelo->prepare("SELECT 007id FROM 007ausuarios WHERE 007correoUsu = :correo LIMIT 1");
		$statement->execute(array("correo" => $correo));
		if ($statement->rowCount() > 0) {
			$data = $statement->fetch()[0];
			$keypass = md5(time());
			$newpass = strtoupper(substr(sha1(time()),0,8));
			$link = APP_URL.'?view=recuperarclave&key='.$keypass;
			try {


						$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

			      //Server settings
						$mail->CharSet= "UTF-8";
						$mail->Encoding = "quoted-printable"; /**/
			      // $mail->SMTPDebug = 2;                                 // Habilitar salida de depuración detallada, es informe acerca del correo que se ha envido

			      $mail->isSMTP();                                      // Establecer correo para usar SMTP
			      $mail->Host = PHPMAILER_HOST; 		 // Especifique servidores SMTP principales y de respaldo /*hostindel provedor del correo*/
			      $mail->SMTPAuth = true;                               // Habilitar autenticación SMTP
			      $mail->Username = PHPMAILER_USER;                    // Nombre de usuario SMTP
			      $mail->Password = PHPMAILER_PASS;                           // SMTP calve de SMTP
			      $mail->SMTPSecure = 'ssl';                            // Habilitar el cifrado TLS, `ssl` también aceptado
			      $mail->Port = PHPMAILER_PORT;                                    //Puerto TCP para conectarse a

			      //Recipients
			      $mail->setFrom(PHPMAILER_USER, "San Mateo informa");         //Quien manada el correo
			      $mail->addAddress($correo, "Anonimos");     // Add a recipient // Adonde llega el correo


						$mail->isHTML(true);                                  // Set email format to HTML
			      $mail->Subject = 'Recuperar contraseña';								/*Asunto del correo*/
			      $mail->Body    = emailTemplateRecuperarClave($link);  /*Cuerpo del mensaje*/
			      $mail->AltBody = 'Hola para recuperar tu clave, debes ir ha este enlace '.$link.' si no has solicitado un cambip de contraseña omite este paso.';  /*En caso de paerosna no puede ver el codigo html*/


						if ($mail->send()) {
							$statement1 = $this->modelo->prepare("UPDATE 007ausuarios SET 007keypass = :keypass , 007newpass = :newpass WHERE 007id = :id_usu");
							$statement1->execute(array("keypass" =>  $keypass, "newpass" => $newpass , "id_usu" => $data));
							$msg = array("estado" => true , "msg" => true) ;
							$statement1->closeCursor();
						}else{
							$msg = array("estado" => true , "msg" => "fallo_envio") ;
						}
			      // echo 'Message has been sent';

			} catch (Exception $e) {
				$msg = array("estado" => false , "msg" => $mail->ErrorInfo ) ;

			}

		}else{
			$msg = array("estado" => false  , "msg" => "email_falso");
		}
		$statement->closeCursor();
		return $msg;
	}


	public function logueo($usu,$pass)
	{

		$m=null;

		$sql="SELECT 007rolUsu,007nombreUsu from 007ausuarios where (007nombreUsu=:usu OR 007correoUsu=:usu) AND 007claveUsu=:pass";
		$statement=$this->modelo->prepare($sql);
		$statement->bindparam(":usu",$usu);
		$statement->bindparam(":pass",$pass);

		if ($statement->execute()) {
			if ($statement->rowCount() > 0) {
				$datos=$statement->fetch();

				$this->i007nombreUsu = $datos[1];
				$this->i007rolUsu = $datos[0];

				$this->getId();

				$array = array($this->id,$this->i007rolUsu);

				if ($this->i007rolUsu == 1) {   //Super admninistrador
					$_SESSION['usuario']=$array;
					$m='?view=superinicio';

				}else if($this->i007rolUsu == 2){    // Secretaria

					$_SESSION['usuario']=$array;
					$m='?view=secretariainicio';

				}else if($this->i007rolUsu == 3){   // Profesor

					$_SESSION['usuario']=$array;
					$m='?view=profesorinicio';

				}else if($this->i007rolUsu == 4){    //usuario est,padre etc

					$_SESSION['usuario']=$array;
					$m='?view=usuarioinicio';
				}else{
					// datos incorrextos, no se encuentra usuario
					// $m = $usu   ."   ". $pass;
					$m = 4;
				}
			}else{
				/*No se encontraron filas afectadas*/
				$m = 4;
			}
		}else{
			$m = 5;
		}

		$statement->closeCursor();
		return $m;
	}

	function getId(){
		$statement = null;


		if ($this->i007rolUsu == 3 || $this->i007rolUsu == 2 ||  $this->i007rolUsu == 1 ) {
			$statement = $this->modelo->prepare("SELECT 008id  FROM 008adirectivas WHERE 008documento = :doc LIMIT 1");
				if( $statement->execute( array("doc" => $this->i007nombreUsu) ) )
					{
						$data = $statement->fetch();
						$this->id = $data[0];
					}
		}else if($this->i007rolUsu == 4 || $this->i007rolUsu == 5 || $this->i007rolUsu == 6 ){
			$statement = $this->modelo->prepare("SELECT 000id  FROM 000aalumno WHERE 000docMad = :doc OR 000docPad = :doc OR 000emailAcu = :doc LIMIT 1");
				if( $statement->execute(array("doc" => $this->i007nombreUsu)) )
					{
						$data = $statement->fetch();
						$this->id = $data[0];
					}
		}
		$statement->closeCursor();
	}

	// public function getPass($usu,$pass){
	// 	$m=mull;

	// 	$sql="SELECT 007claveUsu from 007ausuarios where (007nombreUsu=:usu OR 007correoUsu=:usu) AND 007claveUsu=:pass";
	// 	$statement=$this->modelo->prepare($sql);
	// 	$statement->bindparam(":usu",$usu);
	// 	$statement->bindparam(":pass",$pass);

	// 	if ($statement->execute()) {
	// 		$data = $statement->fetch();
	// 		if ($statement->countRow() > 0) {
	// 			$m=$data[0];
	// 		}else{
	// 			$m = "error";
	// 		}

	// 	}else{

	// 		$m = "error";
	// 	}
	// 	return $m;

	// }

	 function __destruct(){
	 	$this->modelo = NULL;
	}

}

 ?>

<?php

	require(CMODELO.'Alumno.php');


$v1=$_POST['documento'];
$v2=sp($_POST['tipDocumento']);
$v3=sp($_POST['genero']);
$v4=sp($_POST['nombres']);
$v5=sp($_POST['apellidos']);
$v6=sp($_POST['fecNacimiento']);
$v7=sp($_POST['jornada']);
$v8=sp($_POST['email']);
$v9=sp($_POST['celular']);
$v10=sp($_POST['eps']);
$v12=sp($_POST['telFijo']);
$v13=sp($_POST['direccion']);
$v14=sp($_POST['barrio']);
$v15=sp($_POST['nomAcu']);
$v16=sp($_POST['apelAcu']);
$v17=sp($_POST['celAcu']);
$v18=sp($_POST['fijoAcu']);
$v19=sp($_POST['emailAcu']);
$v20=sp($_POST['nomMad']);
$v21=sp($_POST['apelMad']);
$v22=sp($_POST['celMad']);
$v23=sp($_POST['fijoMad']);
$v24=sp($_POST['emailMad']);
$v25=sp($_POST['nomPad']);
$v26=sp($_POST['apelPad']);
$v27=sp($_POST['celPad']);
$v28=sp($_POST['fijoPad']);
$v29=sp($_POST['emailPad']);
$v30=sp($_POST['sede']);
$v31=sp($_POST['rh']);
$v32=sp($_POST['docPad']);
$v33=sp($_POST['docMad']);
$v34=sp($_POST['tipDocPad']);
$v35=sp($_POST['tipDocMad']);
$v36=sp($_POST['curso']);
$v37=sp($_POST['gradosc']);
$v38=sp($_POST['gradosr']);
$v39=sp($_POST['matricula']);

$modelo=new Alumno();

$ruta = "view/app/imagenes/Thumbnail/avatardefault.png";


	if(isset($_FILES['foto']) && $_FILES['foto']['name'] !=""){

		$v11=$_FILES['foto'];
		$nomOriginal = $v11['name'];
		$peso = $v11['size'];
		$tipo = $v11['type'];
		$nomtemporal = $v11['tmp_name'];
		$max = 2000000;
	
		//$ruta = "view/app/imagenes/Thumbnail/".$nomOriginal; //windows

		$rutaservidor = RUTALINUX."view/app/imagenes/Thumbnail/".$nomOriginal;
		$ruta = "view/app/imagenes/Thumbnail/".$nomOriginal; //windows
			if ($peso>$max) {
				//el tamaño de la imagen es demasiada
				$alum=8;
			}else if($tipo=="image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
				
				
				if (!move_uploaded_file($nomtemporal, $rutaservidor)) {   //window
				//if (!copy($nomtemporal, $ruta)) {     //linux

					//cuando no se guarda la imagen
					$alum=7;
				}else{
					$modelo->setAlumno($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$ruta,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29,$v30,$v31,$v32,$v33,$v34,$v35,$v36,$v37,$v38,$v39);

					$alum=$modelo->setAddAlumno();
					//$modelo->getAll();

					//echo $modelo->getMatricula();
				}
			}	
			
	}else{
				$modelo->setAlumno($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$ruta,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29,$v30,$v31,$v32,$v33,$v34,$v35,$v36,$v37,$v38,$v39);

				$alum=$modelo->setAddAlumno();
				//echo $modelo->getMatricula();

				//$modelo->getAll();
	}

	echo $alum;

 ?>

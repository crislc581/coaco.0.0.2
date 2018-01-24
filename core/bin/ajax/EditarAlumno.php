<?php 
require_once(MODELO.'Alumno.php');
		$id=sp($_POST['id']);
	    $documento=sp($_POST['documento']);
	    $tipDocumento=sp($_POST['tipoDocumento']);
	    $genero=sp($_POST['genero']);
	    $nombres=sp($_POST['nombres']);
	    $apellidos=sp($_POST['apellidos']);
	    $fecNacimiento=sp($_POST['fecNacimiento']);
	    $jornada=sp($_POST['jornada']);
	    $email=sp($_POST['email']);
	    $celular=sp($_POST['celular']);
	    $eps=sp($_POST['eps']);
	    $foto=sp($_POST['foto']);
	    $telFijo=sp($_POST['telFijo']);
	    $direccion=sp($_POST['direccion']);
	    $barrio=sp($_POST['barrio']);
	    $nomAcu=sp($_POST['nomAcu']);
	    $apelAcu=sp($_POST['apelAcu']);
	    $celAcu=sp($_POST['celAcu']);
	    $fijoAcu=sp($_POST['fijoAcu']);
	    $emailAcu=sp($_POST['emailAcu']);
	    $nomMad=sp($_POST['nomMad']);
	    $apelMad=sp($_POST['apelMad']);
	    $celMad=sp($_POST['celMad']);
	    $fijoMad=sp($_POST['fijoMad']);
	    $emailMad=sp($_POST['emailMad']);
	    $nomPad=sp($_POST['nomPad']);
	    $apelPad=sp($_POST['apelPad']);
	    $celPad=sp($_POST['celPad']);
	    $fijoPad=sp($_POST['fijoPad']);
	    $emailPad=sp($_POST['emailPad']);
	    $sede=sp($_POST['sede']);
	    $rh=sp($_POST['rh']);
	    $docPad=sp($_POST['docPad']);
	    $docMad=sp($_POST['docMad']);

	    $objetoModelo=new Alumno();


	   $resul=$objetoModelo->setEditAlumno("000documento", $documento, $id);
	   $resul=$objetoModelo->setEditAlumno("000tipoDocumento", $tipoDocumento, $id);
	   $resul=$objetoModelo->setEditAlumno("000genero", $genero, $id);
	   $resul=$objetoModelo->setEditAlumno("000nombres", $nombres, $id);
	   $resul=$objetoModelo->setEditAlumno("000apellidos", $apellidos, $id);
	   $resul=$objetoModelo->setEditAlumno("000fecNacimiento", $fecNacimiento, $id);
	   $resul=$objetoModelo->setEditAlumno("000jornada", $jornada, $id);
	   $resul=$objetoModelo->setEditAlumno("000email", $email, $id);
	   $resul=$objetoModelo->setEditAlumno("000celular", $celular, $id);
	   $resul=$objetoModelo->setEditAlumno("000eps", $eps, $id);
	   $resul=$objetoModelo->setEditAlumno("000foto", $foto, $id);
	   $resul=$objetoModelo->setEditAlumno("000telFijo", $telFijo, $id);
	   $resul=$objetoModelo->setEditAlumno("000direccion", $direccion), $id;
	   $resul=$objetoModelo->setEditAlumno("000barrio", $barrio, $id);
	   $resul=$objetoModelo->setEditAlumno("000nomAcu", $nomAcu, $id);
	   $resul=$objetoModelo->setEditAlumno("000apelAcu", $apelAcu, $id);
	   $resul=$objetoModelo->setEditAlumno("000celAcu", $celAcu, $id);
	   $resul=$objetoModelo->setEditAlumno("000fijoAcu", $fijoAcu, $id);
	   $resul=$objetoModelo->setEditAlumno("000emailAcu", $emailAcu, $id);
	   $resul=$objetoModelo->setEditAlumno("000nomMad", $nomMad, $id);
	   $resul=$objetoModelo->setEditAlumno("000apelMad", $apelMad, $id);
	   $resul=$objetoModelo->setEditAlumno("000celMad", $celMad, $id);
	   $resul=$objetoModelo->setEditAlumno("000fijoMad", $fijoMad, $id);
	   $resul=$objetoModelo->setEditAlumno("000emailMad", $emailMad, $id);
	   $resul=$objetoModelo->setEditAlumno("000nomPad", $nomPad, $id);
	   $resul=$objetoModelo->setEditAlumno("000apelPad", $apelPad, $id);
	   $resul=$objetoModelo->setEditAlumno("000celPad", $apelPad, $id);
	   $resul=$objetoModelo->setEditAlumno("000fijoPad", $fijoPad, $id);
	   $resul=$objetoModelo->setEditAlumno("000emailPad", $emailPad, $id);
	 
	   $resul=$objetoModelo->setEditAlumno("000sede", $sede, $id);
	   $resul=$objetoModelo->setEditAlumno("000rh", $rh, $id);
	   $resul=$objetoModelo->setEditAlumno("000docPad", $docPad, $id);
	   $resul=$objetoModelo->setEditAlumno("000docMad", $docMad, $id);
	  
 ?>
<?php

   	require_once(CMODELO.'ingreso.php');
	 $modelo=new Ingreso();

	 $usu =sp($_POST['usuario']);
     //$pass =   encrip(sp($_POST['clave']));
     $pass = sp($_POST['clave']);
     echo $modelo->logueo($usu,$pass);



 ?>

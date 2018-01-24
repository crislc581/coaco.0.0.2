
<?php

require_once('core/core.php');

if(isset($_GET['view'])){
	if(file_exists(CCONTROL.strtolower($_GET['view']).'Controlador.php')){
		include(CCONTROL.strtolower($_GET['view']).'Controlador.php');
	}else{
		include(CCONTROL.'error404Controlador.php');
	}
}else{
	include(CCONTROL.'inicioindexControlador.php'); 
}
 ?>

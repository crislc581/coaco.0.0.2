<?php 

	if (isset($_SESSION['profesor'])) {
		include(HIPROFE.'inicio.php');
	}else{
		header('Location: ?view=inicioindex');
	}

 ?>
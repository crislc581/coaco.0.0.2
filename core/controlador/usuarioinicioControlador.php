<?php 

	if (isset($_SESSION['usuario']) && $_SESSION['usuario'][1]==7 ) {
		include(HIUSU.'inicio.php');
	}else{
		header('Location: ?view=inicioindex');
	}

 ?>
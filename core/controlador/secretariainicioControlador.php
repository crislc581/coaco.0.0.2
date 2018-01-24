<?php 

	if (isset($_SESSION['secretaria'])) {
		include(HISECRE.'inicio.php');
	}else{
		header('Location: ?indexinicio');
	}

 ?>
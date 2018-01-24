<?php 
			
	
	require_once(CMODELO.'jornada.php');
	function listar(){
		$modelo=new Jornada();
		$jornada=$modelo->listarJornada();

		echo json_encode($jornada);
	}
	switch (isset($_GET['option1']) ? $_GET['option1'] : null) {
		case 'listar':
			listar();

			break;
		
		default:
			
			break;
	}

 ?>
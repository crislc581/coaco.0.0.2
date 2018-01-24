<?php

	if ($_POST) {
		require('core/core.php');
		switch (isset($_GET['option']) ? $_GET['option'] : NULL ) {
			case 'login':
				include('core/bin/ajax/login.php');
				break;
			case 'listarJornada':
				include(AJAX.'listarJornada.php');
			break;

			case 'listarcombos':
				include(AJAX.'listarCombos.php');
			break;

			case 'registraralumno':
				include(AJAX.'registrarAlumno.php');
			break;

			case 'listarbarrios':
				include(AJAX.'listarCombos.php');
			break;

			case 'buscarestudiante':
				include(AJAX.'controlObservador.php');
				break;
			case 'recuperarclave':
				include(AJAX.'recuperarclave.php');
				break;
			case 'accionesmatricula':
				include(AJAX.'controllerMatricula.php');
				break;
			case 'accionesasistencia':
				include(AJAX.'controllerAsistencia.php');
				break;
			case 'archivoplanoalumno':
				include(AJAX.'controllerSubirArchivoPlanoAlumno.php');
				break;
			case 'accionesReportes':
				include(AJAX.'controllerCrudReportesPeriodo.php');
				break;
			case 'prubea_':
				echo "Hola esta en la pruab";       /*Recordar borrar esto al final del proyectos*/
				break;


				case 'accionesdirectivas':
					include(AJAX."controllerDirectivas.php");
					break;
			case 'pru':
				echo $_POST['dato'];
				break;


			default:
				echo "Error 405 ajax linea 39 ajax.php";           /*Recordar borrar esto al final del proyectos*/
				break;


			}


	}else{
		var_dump($_POST);
		echo "Error Post ajax -aqui linea 47";
		// header('location: ?view=inicioindex');  /*Recordar borrar esto al final del proyectos*/
	}

 ?>

<?php

	if (isset($_SESSION['usuario'][0])) {
		switch (isset($_GET['pagin']) ? $_GET['pagin'] : NULL) {
			case 'registraralumno':
				include(HISUPER.'registraralumno.php');
				break;
			case 'inicio_observador':
				include(HISUPER.'inicioobservador.php');
				break;

			case 'registrarmatricula':
				include(HISUPER.'supermatricula.php');
				break;
			case 'tomarasistencia':
				include(HISUPER.'tomarasistencia.php');
				break;

			case 'visualizarasistencia':
				include(HISUPER.'verasistencia.php');
				break;

			case 'justificarfalla':
				include(HISUPER.'justificarfalla.php');
				break;

			case 'subirarchivosplanos':
				include(HISUPER.'subirarchivoscsv.php');
				break;

			case 'Cruddirectivas':
				include(HISUPER.'Cruddirectivas.php');
				break;
			case 'crudReportesCadaPeriodo':
				include(HISUPER.'crudReportesCadaPeriodo.php');
				break;

			default:
				include(HISUPER.'inicio.php');
				break;
		}
	}else{
		header('Location: ?view=inicioindex');
	}

 ?>

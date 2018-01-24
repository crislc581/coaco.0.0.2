<?php 
require_once(CMODELO.'Alumno.php');

if ($_POST) {
	$alu = new Alumno();
	if (isset($_SESSION['usuario'][0])) {
		if (substr($_FILES['archivo']['name'], -3) == "csv") {
			echo $_FILES['archivo']['tmp_name'];
			$fecha = date('m/d/Y g:ia');
			$nombrearchivo = $fecha."_".$_FILES['archivo']['name'];
			$carpeta = "/opt/lampp/htdocs/proyectos/controlestudiantiloc/view/app/csvalumnos/";

			if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta."hola.csv")) {
				echo "Error al subir el archivo";
				exit;
			}

			$row = 1;
			$fp = fopen($carpeta.$nombrearchivo, "r");
			$d="";
			while ($data = fgetcsv($fp,30000, ",")) {
				$d[]=$data;
				if ($row!=1) {
					if(!$alu->insertArchivoPlanoAlumno($data[1])){
						echo "Error al intentar subir los archivos";
						break;
					}
				}
				$row++;
			}

			fclose($fp);
			var_dump($d);
		}




	}else
	{
		echo "Error esta intentando en algo q no le incumbe";
	}
}else{
	//header('Location: ?view=superinicio&pagin=subirarchivosplanos');
	echo "Hola el post no exite";
}

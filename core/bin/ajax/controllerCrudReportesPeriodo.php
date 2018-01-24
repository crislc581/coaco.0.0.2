<?php 



  require(CMODELO."NotasDefinitivas.php");
  require(CMODELO.'datosAuxiliares.php');

  $modelNotasDefi=new NotasDefinitivas();
  $cursosModel = new Cursos();
  $periodoModel = new Periodo();

  //Tablas auxiliares o tablas hijas
  //$generoModel  = new Genero();
  //$estadoCivilModel = new EstadoCilvil();
  //$epsModel =  new Eps();
  //$barrioModel = new Barrio();
  //$jornadaModel = new Jornada();
  //$rolModel = new Rol();
  //$TipoDocumentoModel = new TipoDocumento();

  //funciones 
  function convertJson($estadoArray){
  	echo json_encode( array( "estado"=>$estadoArray[0] , "msg"=>$estadoArray[1] ) );
  }

  function verificErrosColumns($valueFile, $dataBd , int $indexBd){
    $val = 0;
    $err=0;
    foreach ($dataBd as  $valueBd) {
        if( strtolower($valueFile) == strtolower($valueBd[ $indexBd ]) ) { $val = $valueBd[0] ; break; }else{ $val = false; } 
    }//end foreach
     
      //capturamos la cantidad de errores
    return ( $val == false ) ?  false : $val  ;
  }




  //case

  switch (isset($_GET['opcion']) ? $_GET['opcion'] : null) {
  	case 'sevaFileCvs':  // Guardar archivo csv
  		//Declarar variables
  		$file=""; 		
  		$response=[];
  		$fileData=null;
  		$rtaError = array(
		  				"errCurso"=>[],
		  				"errPeriodo"=>[]
		  			);
  		$rtaExist = array();
  		$notDoc = [];
  		/*
		1. curso && periodo && fechActual && curso

  		

  			Salida
			Se han encontrado errores en la descripcion de los siguientes cursos
				
			De Cristian:  error a presentar '11s0'
			De Pablo: error presentadi ''
  		*/

			/*
				Error, los datos que intenta subir ya existen en el sistema, se mostrara a continuacion
				los siguientes datos existentes
				
			*/

  		try {

  			if(isset( $_FILES['fileDirective'] ) && strlen($_FILES['fileDirective']['name']) != 0 ){
  				$file = $_FILES['fileDirective'];
  				if($file['type'] == "text/csv"){
  					//variable temporarles
  					$fecha = date( "Y-m-d g:ia" );
  					$newFileSave = str_replace(['/',' '],'-',$fecha .'-'. $file['name']);
  					$rutaServidor = RUTALINUX."view/app/csv/csvReportesAcademicosPeriodo/".$newFileSave;
  					if(move_uploaded_file($file['tmp_name'], $rutaServidor)){
  						if(($fileData = fopen($rutaServidor, "r")) != false){

	  						$dataRowArray = file( $rutaServidor );
	  						$totalFromColumns = count(explode(",",$dataRowArray[0]));
	  						$totalRows =  count( $dataRowArray );
	  						$newDataReturn=[];
	  						
	  						if( $totalFromColumns == 8 ){
	  							if($totalRows > 0){
	  								$count=0;
	  								while ($dataWhile = fgetcsv($fileData ,',')) {
	  									if($count != 0){

	  										//validamos si los campos son escritos correctamente
		  									$infoDb = $cursosModel->getComparinDataBdDataFile( $dataWhile[4] );  //descripcion del documento
		  									if($infoDb[0])
		  										{ $dataWhile[4] = $infoDb[1]; }
		  										else{  array_push($rtaError["errCurso"], array( "nombre"=> $dataWhile[1] , "data"=> $dataWhile[4] ) ); 	}
		  									
		  									$infoDb = $periodoModel->getComparinDataBdDataFilePeriodo( $dataWhile[5] );  //descripcion del documento
		  									if($infoDb[0])
		  										{ $dataWhile[5] = $infoDb[1]; }
		  										else{  array_push($rtaError["errPeriodo"], array( "nombre"=> $dataWhile[1] , "data"=> $dataWhile[5] ) ) ;	}

		  									//Validamos si los campos existen en el sistema
		  									if($modelNotasDefi->validateDataExistsEnBd( array( $dataWhile[3], $dataWhile[4], $dataWhile[5], explode("-",$dataWhile[7])[0]  ) ) ){  // si existe
		  										$rtaExist[] =  $dataWhile[1] ."  ".$dataWhile[2] ;
		  									}

		  									//validamos si el documento existe en el sistema
		  									if( !$modelNotasDefi->verifiDocumentoStuduent($dataWhile[3]) ){
		  										$notDoc[] = array( "nombre"=>$dataWhile[1] , "documento"=> $dataWhile[3] ); 
		  									}

	  									} // wnd == 0
		  								$count++;
		  								$newDataReturn[]=$dataWhile;
	  								} // end while

	  								if(count($rtaError['errCurso']) == 0 && count($rtaError['errPeriodo']) == 0 ){  //miramos si ahy errores de orotgrafia
	  									if( count($rtaExist) == 0 ){
	  										//insertamos los registros
	  										if(count($notDoc) == 0){
		  										for( $i=0; $i < count($newDataReturn); $i++ ){
		  											if( $i != 0 ){
		  												$modelNotasDefi->setAll($newDataReturn[$i][3],$newDataReturn[$i][4],$newDataReturn[$i][5],$newDataReturn[$i][6],$newDataReturn[$i][7]);
			  											if(!$modelNotasDefi->newReporte()){
			  												throw new Exception("Errro al intentar registrar a ".$newDataReturn[$i][1]);
			  												break;
			  											}
		  											}
		  										}
		  										$response = array( true, true);
	  										}else{  // el documento no se encuentra en el sistema
	  											$response = array( "notDoc",$notDoc );
	  										}
	  									}else{ // El registro ya existe
	  										$response = array( "dataExist",$rtaExist );
	  									}
	  								}else{  //eros de ortografia
	  									$response= array("malEscrito",$rtaError);
	  								}
	  							}else{ // error en las filas no hya registros
	  								$response = array( "notRows","En el archivo ".$file['name'] .", no se han encontrado registros, revice cuidadosamente este documento." );
	  							}
	  						}else if($totalFromColumns < 8 || $totalFromColumns > 8){  // errro columns
	  							$response = array( "notColumns" , "El numero de columnas en el archivo es invalido, el numero total de columnas son 8, revice su documento y vuelva a inventarlo" );
	  						}
  						}
  					}else{ // Error al subir el archivo
  						throw new Exception("Error al cargar el archivo al servidor");
  					}
  				}else{ // tipod e archivo incorrecto debe ser cvs
  					$response = array( "notType","El tipo de archivo no es valido seleccione un archivo con la extencion csv." );
  				}
  			}else{ // El archivo esta vacio
  				$response = array( "empty","El archivo seleccionado esta vacio, vuelva a seleccionar otro archivo." );
  			}
  		} catch (Exception $e) {
  			$response = array( "error" , $e->getMessage() );
  		}finally{
  			fclose($fileData);
  			convertJson($response);
  		}
  		break;
  	
  	default:
  		# code...
  		break;
  }
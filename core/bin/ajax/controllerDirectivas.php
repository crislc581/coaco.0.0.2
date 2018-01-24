<?php

  require(CMODELO."directivas.php");
  require(CMODELO.'datosAuxiliares.php');

  $modelDirectives=new Directivas();

  //Tablas auxiliares o tablas hijas
  $generoModel  = new Genero();
  $estadoCivilModel = new EstadoCilvil();
  $epsModel =  new Eps();
  $barrioModel = new Barrio();
  $jornadaModel = new Jornada();
  $rolModel = new Rol();
  $TipoDocumentoModel = new TipoDocumento();

  function convertDataJson($estado , $data){
    return json_encode( array( "estado" => $estado , "msg" => $data ) );
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


  switch (isset($_GET["acciones"]) ? $_GET["acciones"] : null) {
    
    case 'listardirectivas':
      $res=$modelDirectives->lisDirectivas();

      if(count( $res ) == 0){
        echo convertDataJson( false , $res );
      }else{
        $data = null;
          for ($i=0; $i<count($res); $i++) {
            $arregloEliminar = json_encode(array("008id"=> $res[$i]['008id'] , "nombres"=> $res[$i]['008nombres'] , "documento"=> $res[$i]['008documento']  ));
            $data .= '
            <tr class="animated fadeIn">
              <!-- <input type="hidden" name="datos" value=""> -->
              <td>'. $res[$i]["008nombres"] .'</td>
              <td>'. $res[$i]["008apellidos"] .'</td>
              <td>'. $res[$i]["008documento"] .'</td>
              <td>'. $res[$i]["0019desTipo"] .'</td>
              <td>'. $res[$i]["008telFijo"] .'</td>
              <td>'. $res[$i]["008celular"] .'</td>
              <td>'. $res[$i]["008email"] .'</td>
              <td>'. $res[$i]["008direccion"] .'</td>
              <td>'. $res[$i]["0010desBarrio"] .'</td>
              <td>'. $res[$i]["0015desJornada"] .'</td>
              <td>'. $res[$i]["009desUsu"] .'</td>


              <td>
                <a href="#modalFrmData" class="btn  btn-primary btn-sm btn-edit" data-toggle="modal" data=\' '.json_encode($res[$i]).' \' > <span class="fa fa-edit"></span>
                </a>
              </td>

              <td>
                <a href="#" class="btn btn-danger btn-sm btn-remove" data=\' '.  $arregloEliminar  .' \' ><span class="fa fa-trash"  ></span>
                </a>
              </td>

            </tr>
            ';
          }  //end for
          echo convertDataJson( true , $data );
        }

      break;

    case 'updateDirectivas':
      $response = array();
      try {
          $modelDirectives->setAll($_POST['nombre'],
                                   $_POST['apellido'],
                                   $_POST['fechaNacimiento'],
                                   $_POST['genero'],
                                   $_POST['estadoCivil'],
                                   "",
                                   $_POST['email'],
                                   $_POST['celular'],
                                   $_POST['eps'] ,
                                   $_POST['tel'],
                                   $_POST['direccion'],
                                   $_POST['barrio'] ,
                                   $_POST['nombreAcu'] ,
                                   $_POST['apellidoAcu'] ,
                                   $_POST['celularAcu'],
                                   $_POST['telAcu'],
                                   $_POST['jornada'] ,
                                   $_POST['documento'],
                                   $_POST['rol'],
                                   $_POST['tipoDocumento']);
          $modelDirectives->SetIdDoc( $_POST['idDirectiva'] , $_POST['documento']);
          $response =  array( true , $modelDirectives->editDirectivas() ) ;
      } catch (Exception $e) {
        $response = array( false , $e->getMessage());
      }finally{
        echo convertDataJson( $response[0], $response[1] );
      }
      break;

    case 'newDirectiva':
      $response = null;
      try {
        $modelDirectives->setAll(  $_POST['nombre'],
                                   $_POST['apellido'],
                                   $_POST['fechaNacimiento'],
                                   $_POST['genero'],
                                   $_POST['estadoCivil'],
                                   "",
                                   $_POST['email'],
                                   $_POST['celular'],
                                   $_POST['eps'] ,
                                   $_POST['tel'],
                                   $_POST['direccion'],
                                   $_POST['barrio'] ,
                                   $_POST['nombreAcu'] ,
                                   $_POST['apellidoAcu'] ,
                                   $_POST['celularAcu'],
                                   $_POST['telAcu'],
                                   $_POST['jornada'] ,
                                   $_POST['documento'],
                                   $_POST['rol'],
                                   $_POST['tipoDocumento']);
        $response =  $modelDirectives->nuevaDirectiva();
        $response = ( $response === 9 && $response != 1 ) ? array( true , 9 ) : array( true , true );
      } catch (Exception $e) {
        $response = array( false , $e->getMessage());
      }finally{
        echo convertDataJson( (bool)$response[0] , $response[1] );

      }
    
      break;

    case 'deleteDirective':
      $response = null;
      try {
        //var_dump($_POST);
        $modelDirectives->SetIdDoc( $_POST['idDirective'] , $_POST['documento'] );
        $da = $modelDirectives->eliDirectivas();
        $response = array( true ,true  );
      } catch (Exception $e) {
        $response = array( false , $e->getMessage() );
      }finally{
        echo convertDataJson( $response[0]  , $response[1] );
      }
      
       
      break;

    case 'sevaFileCvs':
      
        try {
          $response = null;
          if( $_FILES['fileDirective']['type'] == "text/csv" ){
            $fecha = date('m/d/Y g:ia');
          
            $nombreArchive = str_replace(["/" , " "], "-", $fecha . "-" .$_FILES['fileDirective']['name']);
            $rutaservidorTemporal = RUTALINUX."view/app/csv/csvDirectivas/".$nombreArchive;
           // $rutaservidorTemporal = RUTALINUX."view/app/csv/csvDirectivas/".$_FILES['fileDirective']['name'];
            $rutaBd = "view/app/imagenes/Thumbnail/".$nombreArchive; //windows
           

            if( move_uploaded_file($_FILES['fileDirective']['tmp_name'], $rutaservidorTemporal ) ){
            
              $row = 1;
              $contadoNewData=0;
              $fp = fopen($rutaservidorTemporal, "r");   //abrimos el archivo
              $fp1 = fopen($rutaservidorTemporal, "r");
              $datos = null;
              //Variables de error
              $errGenero = 0;
              $errEstadoCivil = 0;
              $errEps = 0;
              $errBarrio = 0;
              $errJornada = 0;
              $errRol = 0;
              $errTipoDocumento = 0;

              $valGenero = 0;
              $valEstadoCivil = 0;
              $valEps = 0;
              $valBarrio = 0;
              $valJornada = 0;
              $valRol = 0;
              $valTipoDocumento = 0;


              // //creamos arreglos para capturar los erros de documentos o correos existentes
              // $errDocuemntoExist = array();
              // $errCorreoExist = array();

               //creamos arreglos para capturar los erros de documentos o correos existentes
              $newDataInsertar= array();        //

               $errMix = array(  "errroCorreo" =>[],           //
                                    "errorDocumento" => []
                               );


                if( count(fgetcsv($fp1, 100000 , ",") ) >  21 || count(fgetcsv($fp1 , 1000 , ",") ) < 21  ){   //validado
                  $response = array(false , "notColumns" ); //validado
                  throw new Exception("notColumns");   //validado
                  //exit
                }
                
              while($data = fgetcsv($fp , 10000 , ",") ){

                if($row != 1){ //seranecho las cabezeras del documento excel

                 $datos = verificErrosColumns($data[4] ,$generoModel->listarGenero() , 1);
                 if( !$datos ){  $errGenero++; }else{ $data[4] = $datos;  };

                 $datos = verificErrosColumns($data[5] ,$estadoCivilModel->listEstadoCivil() , 1);
                 if( !$datos ){  $errEstadoCivil++; }else{ $data[5] = $datos;  };

                 $datos = verificErrosColumns($data[9] ,$epsModel->listarEps() , 1);
                 if( !$datos ){  $errEps++; }else{ $data[9] = $datos;  };

                 $datos = verificErrosColumns($data[12] ,$barrioModel->listBarrioAll() , 1);
                 if( !$datos ){  $errBarrio++; }else{ $data[12] = $datos;  };

                 $datos = verificErrosColumns($data[17] ,$jornadaModel->listarJornada() , 1);
                 if( !$datos ){  $errJornada++; }else{ $data[17] = $datos;  };

                 $datos = verificErrosColumns($data[19] ,$rolModel->listarRoles() , 1);
                 if( !$datos ){  $errRol++; }else{ $data[19] = $datos;  };

                 $datos = verificErrosColumns($data[20] ,$TipoDocumentoModel->listarTD() , 1);
                 if( !$datos ){  $errTipoDocumento++; }else{ $data[20] = $datos;  };

                //RECORDAR VALIDAR SI LOS REGISTROS DE LA BASE DE DATOS SON IAGUALES AL DEL ARCHIVO NO REMPLAZARLOS MANDAR ALERTA DICIENDO EL NOMBRE DE TAL YA ESTA EN EL SISTEMA 
                //Validar Tipo si el documento ya existe ene el sistema y mostrar que docuemnto ya existe


                  $dataModel = $modelDirectives->validateDocumentEmailExists( $data[18] , $data[7] );

                  if($dataModel["documento"]["estado"] == "existe" ){
                    array_push( $errMix["errorDocumento"] , $dataModel["documento"]["data"] ) ;
                  }

                  if($dataModel["correo"]["estado"] == "existe" ){
                    array_push( $errMix["errroCorreo"] , $dataModel["correo"]["data"] ) ;
                  }
                  
                  



                 
                } // hader de la tablas if == 1errMix
                $newDataInsertar[] = $data;
                $contadoNewData++;
                $row++;
              }//end while


              //haci esta la informacion recolectada de los errores  == $errMix
              $arreglo = array(     //
                                  "errroCorreo" => array( 
                                    array( "nombre" => "cristian" , "correo" => "ccroemro581@misena.edu.coi"  ),
                                    array( "nombre" => "camilo" , "correo" => "sddsadasd@misena.edu.coi"  ),
                                    array( "nombre" => "Nicolas" , "correo" => "ccroemro581@misena.edu.coi"  )
                                  ),
                                  "errorDocumento" => array(  
                                    array( "nombre" => "cristian" , "documento" => "ccroemro581@misena.edu.coi"  ),
                                    array( "nombre" => "camilo" , "documento" => "sddsadasd@misena.edu.coi"  ),
                                    array( "nombre" => "Nicolas" , "documento" => "ccroemro581@misena.edu.coi"  )
                                  )
                              );




              if(  $errGenero > 0 || $errEstadoCivil > 0 || $errEps > 0 || $errBarrio > 0 || $errJornada > 0 || $errRol > 0 || $errTipoDocumento > 0   ){   // validado
                  $response = array( "errorCampus" ,  array(    //
                                                              "errGenero"=>$errGenero,
                                                              "errEstadoCivil"=>$errEstadoCivil,
                                                              "errEps"=>$errEps,
                                                              "errBarrio"=>$errBarrio,
                                                              "errJornada"=>$errJornada,
                                                              "errRol"=>$errRol,
                                                              "errTipoDocumento"=>$errTipoDocumento
                                   )                      );                
              }else if( count($errMix["errroCorreo"]) > 0 ||  count($errMix["errorDocumento"]) > 0  ){  //
                      $response = array( "dataExist" ,   $errMix  );  //
                    }else{        // 
                      //Hay que agregar este funcion al modelo
                      //hacemos otro bucle para para insertar con los datos ya corregidos
                      //$row = 1;
                      $saveData=[];

                      for($i = 0; $i < count($newDataInsertar); $i++){

                        if(0 != $i){ //seranecho las cabezeras del documento excel
                          $fecha = date( "Y-m-d" );
                          $modelDirectives->setAll(  
                                   $newDataInsertar[$i][1],  //nombre
                                   $newDataInsertar[$i][2],  //apellidos
                                   $newDataInsertar[$i][3], //fecha nacimiento
                                   $newDataInsertar[$i][4], // genero
                                   $newDataInsertar[$i][5],   //estado civil
                                   $newDataInsertar[$i][6],     // fecha de ingraso
                                   $newDataInsertar[$i][7],   // correo
                                   $newDataInsertar[$i][8],   // celular
                                   $newDataInsertar[$i][9] ,   // eps
                                   $newDataInsertar[$i][10],   // tel fijo
                                   $newDataInsertar[$i][11],    //direccion
                                   $newDataInsertar[$i][12] ,   // barrio
                                   $newDataInsertar[$i][13] ,  //nom acudiente
                                   $newDataInsertar[$i][14] , // apellido acu
                                   $newDataInsertar[$i][15],  // celular d acudiente  
                                   $newDataInsertar[$i][16],  // fijo de acudiente  
                                   $newDataInsertar[$i][17] ,   // jornada
                                   $newDataInsertar[$i][18],  // docum,ento
                                   $newDataInsertar[$i][19],  //rol
                                   $newDataInsertar[$i][20]   //tipo de documento
                                 );
                                // "1",  --
                                  // "CrisOmar",
                                  // "RomTegon",
                                  // "1998-01-01",
                                  // "3",
                                  // "1",
                                  // "2017-11-03",
                                  // "ccromero581@misena.edu.co",
                                  // "3113000",
                                  // "31",
                                  // "123456",
                                  // "calle 27",
                                  // "2",
                                  // "Rubis",
                                  // "Romero Pñierpos",
                                  // "31145734204",
                                  // "12345684",
                                  // "1",
                                  // "123456",
                                  // "1", /rol
                                  // "1", /tipo
                                  // "1"--
                          
                          
                          $data = $modelDirectives->nuevaDirectiva();

                          if( $data[0] && $data[1] ){  //
                            //$response = array( true,true );
                          }else if($data[0] == "docRepi"){
                            $saveData[] = $data[1];     //validado
                          }else{
                            throw new Exception("errorInsert");
                          }

                        } //end if row 1
                      } //end for

                      //valdiar que lso datos esten repidos o no lo esten
                      if(count($saveData) > 0){
                        $response = array(  "dataBdExistDoc" , $saveData ); // validado
                      }else{
                        $response = array( true,true );
                      }

                    }  //
            }else{  //else cuando no se carga bien el archivo en updated_upload_move de php
              throw new Exception("Error al cargar el archivo");
            }
          }else{  // Cuando el tipo de achivo no es correcto
            $response = array( false , "fileIncorrect" );  //validado
          }
        } catch (Exception $e) {
             $response=array( false , $e->getMessage() );
        }finally{
          fclose($fp1);
          fclose($fp);
          echo convertDataJson( $response[0] , $response[1] );
        }

      break;

    default:
        echo convertDataJson( false, "Error 404 ruta no encontrada, vuelva a intentarlo" );
      break;
  }

 ?>

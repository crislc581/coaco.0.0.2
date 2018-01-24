
<?php


// ============ nucleo de la aplicaion ==================

// variables globales
session_start();

/**
 * @return hora de bogotà
 * @return localidad es idioma español
 */
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

/*Ruta de la pagina*/
  // define("APP_URL","http://localhost/proyectos/proyectos/Proyecto%20compartido/controlestudiantiloc/"); /*Evitar hacer injecciones ataques jacascript, ayuda para url amigables*/
  define("APP_URL","localhost:8080/proyectos/controlestudiantiloc/"); /* version linux Evitar hacer injecciones ataques jacascript, ayuda para url amigables*/


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','coaco');



/*define('HOST','mysql.webcindario.com');
define('USER','coaco');
define('PASS','echohinata');
define('DB','coaco');
*/




/*PHP composer*/


require("vendor/autoload.php");
define('PHPMAILER_HOST','p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER','public@ocrend.com');
define('PHPMAILER_PASS','Prinick2016');
define('PHPMAILER_PORT',465);








//variables fijas para redireccionar
// vistas

define('HISUPER','html/index/super/');
define('HISECRE','html/index/secretaria/');
define('HIPROFE','html/index/profesor/');
define('HIUSU','html/index/usuario/');
define('HIINICIO','html/index/inicio/');
define('OVERALL', 'html/overall/');

// modelo
define('CCONTROL','core/controlador/');
define('CMODELO','core/modelo/');
define('AJAX','core/bin/ajax/');

// vistas estilos front end
define('VADVENDOR','view/admin/vendor/');
define('VAPCSS','view/app/css/');
define('VAPP','view/app/');


///ruta de servidor en linux para los archivos
define('RUTALINUX','/opt/lampp/htdocs/proyectos/controlestudiantiloc/');




//================ incluimos la conexion ===============
require('core/modelo/conexion.php');



// funcciones globales
require('core/bin/functions/encry.php');
require('core/bin/functions/special.php');
require('core/bin/functions/shortword.php');
require('core/bin/functions/emailTemplate.php');
require('core/bin/functions/fechas.php');




//proceso para la barra de navegacion

  if(isset($_SESSION['usuario'])){
    switch ($_SESSION['usuario'][1]) {
      case 1:  //Administrador
        $_backgroundH = "navbar-dark bg-dark";
        $_backgroundV = "";
        break;
      case 2:  
        $_backgroundH = "navbar-light bg-light";
        $_backgroundV = "navbar-light bg-primary barra-vertical-color";
        break;
      case 3:  //profesor
           $_backgroundH = "navbar-light bg-light";
           $_backgroundV = "navbar-light bg-primary barra-vertical-color";
        break;
      case 4:
        
        break;
      
      default:
        # code...
        break;
    }
  }

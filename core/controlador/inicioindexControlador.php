<?php




if (isset($_SESSION['usuario'][0])  &&  $_SESSION['usuario'][1] == 1 ) {
	header('location: ?view=superinicio');  //Super administrador
}else if(isset($_SESSION['secretaria']) &&  $_SESSION['usuario'][1] == 2 ){
	header('location: ?view=secretariainicio');
}else if(isset($_SESSION['profesor']) &&  $_SESSION['usuario'][1] == 3){
	header('location: ?view=profesorinicio');
}else if(isset($_SESSION['usuario']) &&  $_SESSION['usuario'][1] == 7 ){
	header('location: ?view=usuarioinicio');
}else{
	include(HIINICIO.'index.php');
}

 

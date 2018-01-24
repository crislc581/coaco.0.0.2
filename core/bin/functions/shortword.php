<?php

function shortword($palabra,$cantidad){
  $largo = strlen($palabra);
  $cadena = substr($palabra,0,$cantidad);
  return $cadena;
}



 ?>

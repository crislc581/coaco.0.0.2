<?php
//funcion para encriptar contraseña
function encrip($string){
  $longitud = strlen($string);
  $str = '';

  for($x = 0; $x < $longitud; $x++ )
  {
    //Aca les estamkos diciendo si es par No me increte la contraseña y si no es par increctemela
    $str .= ($x % 2) != 0 ? md5($string[$x]) : $x;
  }
  return md5($str);
}
 ?>

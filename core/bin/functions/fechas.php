<?php
function _dia(){
  $dia ="";
  switch (date('l')) {
    case 'Monday':
      $dia = "Lunes";
      break;
    case 'Tuesday':
      $dia = "Martes";
      break;
    case 'Wednesday':
      $dia = "Miercoles";
      break;
    case 'Thursday':
      $dia = "Jueves";
      break;
    case 'Friday':
      $dia = "Viernes";
      break;
    case 'Saturday':
      $dia = "Sabado";
      break;
    case 'Sunday':
      $dia = "Domingo";
      break;
    default:
      $dia = "No hay fecha";
      break;
  }
  return $dia;
}

function _mes(){

}

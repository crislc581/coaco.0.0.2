<?php
  include_once(CMODELO.'ingreso.php');
  $in = new Ingreso();
  $data =  $in->recuperarClave(sp($_POST['email']));

  echo json_encode($data);
 ?>

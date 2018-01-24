<?php

if (!isset($_SESSION['usuario'][0]) && !isset($_SESSION['secretaria']) && !isset($_SESSION['profesor']) && !isset($_SESSION['usuario']) && isset($_GET['key'])) {
  $cn = new Conexion();
  $key = $_GET['key'];
  $statement = $cn->prepare("SELECT 007id,007newpass FROM 007ausuarios WHERE 007keypass = :keypass  LIMIT 1 ");
  if ($statement->execute(array("keypass" => sp($key)))) {
    if ($statement->rowCount() > 0) {
      $data = $statement->fetch();
      $id = $data[0];
      $newPass = encrip($data[1]);
      $password = $data[1];
      $statement1 = $cn->prepare("UPDATE 007ausuarios SET 007keypass='' , 007newPass='', 007claveUsu = :nuevaclave WHERE 007id = :id_user ");
      if ($statement1->execute(array("nuevaclave" => $newPass , "id_user" => $id))) {
        include(HIINICIO.'nuevacontrasena.php');
      }
    }else{
      header("Location: ?view=inicioindex");
    }
  }
}else{
  header("Location: ?view=inicioindex");
}



 ?>

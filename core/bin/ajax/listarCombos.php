<?php
require(CMODELO.'datosAuxiliares.php');
switch (isset($_GET['option2']) ? $_GET['option2'] : NULL ) {
  case 'listardepartamento':
      $dep = new Departamentos();
      $a=$_POST['dato'];
      $vector=$dep->listarD($a);


      ?><option selected></option><?php
      foreach ($vector as $fila): ?>
        <option value="<?=$fila['005id'];?>"><?=$fila['005desDepartamento']; ?></option>
      <?php endforeach;
    break;

  case 'listarciudad':

      // $idDepartamento=$_POST['dato'];
      $dep = new CiuMuni();
      $a=$_POST['dato'];
      $dep->setId($a);
      $retorno=$dep->getId();
      $vector=$dep->listarCM($retorno);

      if ($vector != null){
        ?><option selected></option><?php
        foreach ($vector as $fila): ?>
          <option value="<?=$fila['006id'];?>"><?=$fila['006desCiudad']; ?></option>
        <?php endforeach;
      }else{
        echo "No se encuentra registros";
      }
    break;

    case 'listarbarrios':
      $idCiudad=$_POST['dato'];
      $dep = new Barrio();
      // $a=$_POST['dato'];
      $vector=$dep->listarB($idCiudad);
      if ($vector != null){
        ?><option selected></option><?php
        foreach ($vector as $fila): ?>
          <option value="<?=$fila['0010id'];?>"><?=$fila['0010desBarrio']; ?></option>
        <?php endforeach;
      }else{
        echo "No se encuentra registros";
      }
    break;

    case 'insBarrio':
        $c=$_POST['ciu'];
        $b=strtolower($_POST['bari']);
        $ba=ucfirst($b);
        $barrio=new Barrio();
        $insert=$barrio->registrarBarrio($ba,$c);

        echo $insert;

      break;
      case 'insEps':
        $nom=strtolower($_POST['nombre']);
        $nombre=ucfirst($nom);
        $tel=$_POST['telefono'];
        $modelo=new Eps();
        $res=$modelo->insEps($nombre,$tel);

        echo $res;
        break;

        case 'lisEps':
          $modelo=new Eps();
          $tipos=$modelo->listarEps();
          ?> 	<option selected>Seleccione Una Eps</option> <?php
          for ($i=0; $i<count($tipos); $i++) {
          ?>
            <option value="<?=$tipos[$i]['002id']; ?>"><?=$tipos[$i]['002desEps']; ?></option>
          <?php
            }
          break;

  default:
    echo "error 403";
    break;
}


 ?>

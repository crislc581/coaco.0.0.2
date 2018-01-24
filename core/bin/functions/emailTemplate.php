<?php

function emailTemplateRecuperarClave($link){
  $html = '<div style="width: 90%; box-shadow: 1px 1px 5px rgba(0,0,0,.4); border-radius: 2px;">
      	   <div style="padding: 10px; background: rgb(238, 238, 238); color:black; text-align: center; width: 100%">
      	     	<h5>Recupera tu clave</h5>
      	   </div>
      	   <div style="padding-top: 10px;" >
      	   		<strong>Solicitud de cambio de contraseña</strong>
      	   		<p>El dia '.date('d/m/Y' , time()).' se ha generado una solicitud de recuperacion de conraseña. <br>
      	   			Si no has solicitado esto, has caso omiso a este mensage, en cambio si deseas modificar tu contraseña debes hacer click en el enlace de abajo.
      	   		</p>
      	   		<p>

      	   			<a href="'.$link.'">Para modificar tu contraseña has click aqui</a>
      	   		</p>
      	   </div>
      	   <div style="padding: 10px; background: rgba(238, 238, 238,.8); color:rgba(0,0,0,.7); text-align: center; width: 100%">
      	     	<h6 style="font-size: 14px;">Institucion educativa San Mateo</h6>
      	     	<h6 style="font-size: 12px; opacity: .09">&copy; '.date("Y",time()) .' Reservado con todos los derechos dek autor</h6>
      	   </div>
       	</div>';
        return $html;
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="view/frameworks/jquery-3.1.1.min.js"></script>
	<?php include(OVERALL.'header.php'); ?>
</head>
<body>


		<div class="modal fade in" id="modal-login">
			<div class="modal-dialog">
	      <div class="modal-content">
					<div class="modal-header bg-primary text-white">
						Login
					</div>
					<div class="modal-body">
						<div class="form-group" id="rta_ajax_login">

						</div>
	          <form>
	            <div class="form-group">
	              <label for="exampleInputEmail1">Documento / Correo </label>
	              <input type="email" class="form-control" id="usu" aria-describedby="emailHelp" placeholder="Enter email">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputPassword1">Clave</label>
	              <input type="password" class="form-control" id="pass" placeholder="Password">
	            </div>
	            <!-- <div class="form-group">
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input type="checkbox" class="form-check-input">
	                  Remember Password
	                </label>
	              </div>
	            </div> -->
	            <a class="btn btn-primary btn-block" id="btnlogin" href="#">Iniciar</a>
	          </form>
	          <div class="text-center">
	            <a class="d-block small" data-toggle="modal" id="bnt-olvidar"  href="#Recuperar_clave">¿Se te olvidó tu contraseña?</a>
	          </div>
			    </div>
	      </div>
			</div>
		</div>

		<?php include_once(HIINICIO.'recuperarclave.html'); ?>
	<!-- <a href="#modal-login" data-target="#modal-login" data-toggle="modal" class="btn btn-info">Logina</a> -->
	<br>
		<div class="alert alert-info">
      <strong>Contraseña cambiada</strong>
      <p>Se ha generado una nueva coontraseña <strong> <?=$password?></strong> , Prueva <a   href="#modal-login" data-target="#modal-login" data-toggle="modal">iniciar sesion </a> con ella</p>
      <!-- <p></p> -->
		</div>



    <?php include(OVERALL.'footer.html'); ?>
      <script src="<?=VAPP.'js/login.js'?>"></script>
  </body>
  </html>

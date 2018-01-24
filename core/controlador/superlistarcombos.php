<?php
	require(CMODELO."datosAuxiliares.php");
	function lisTD(){

		$modelo=new TipoDocumento();
		$tipos=$modelo->listarTD();

		for ($i=0; $i<count($tipos); $i++) {
		?>
			<option value="<?=$tipos[$i]['0019id']; ?>"><?=$tipos[$i]['0019desTipo']; ?></option>

		<?php
		}



	}



	function lisGenero(){

		$modelo=new Genero();
		$g=$modelo->listarGenero();
		for ($i=0; $i<count($g); $i++) {
		?>
			<option value="<?=$g[$i]['001id']; ?>"><?=$g[$i]['001desGenero']; ?></option>

		<?php
		}

	}

	function lisRh(){

		$modelo=new Sangre();
		$g=$modelo->listarRh();
		for ($i=0; $i<count($g); $i++) {
		?>
			<option value="<?=$g[$i]['0023id']; ?>"><?=$g[$i]['0023desRh']; ?></option>

		<?php
		}

	}
	function lisBloque(){
		$modelo=new Bloque();
		$res=$modelo->listarBloques();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0018id']; ?>"><?=$res[$i]['0018desBloque']; ?></option>
		<?php
		}
	}

	function lisMaterias(){
		$modelo=new Materia();
		$res=$modelo->listarMaterias();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0016id']; ?>"><?=$res[$i]['0016desMateria']; ?></option>
		<?php
		}
	}

	function lisPeriodo(){
		$modelo=new Periodo();
		$res=$modelo->listarPeriodo();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0021id']; ?>"><?=$res[$i]['0021desPeriodo']; ?></option>
		<?php
		}
	}
	function lisJornada(){

		$modelo=new Jornada();
		$res=$modelo->listarJornada();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0015id']; ?>"><?=$res[$i]['0015desJornada']; ?></option>

		<?php
		}

	}

	function lisSede(){

		$modelo=new Sede();
		$res=$modelo->listarSede();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0022id']; ?>"><?=$res[$i]['0022desSede']; ?></option>

		<?php
		}

	}

	function lisCursos(){

		$modelo=new Cursos();
		$res=$modelo->listarCursos();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0020id']; ?>"><?=$res[$i]['0020desCurso']; ?></option>

		<?php
		}
	}
	function lisEps(){
		$modelo=new Eps();
		$res=$modelo->listarEps();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['002id']; ?>"><?=$res[$i]['002desEps']; ?></option>

		<?php
		}
	}

	function listarCursoMatricula(){
		$modelo=new Cursos();
		$res=$modelo->listarCursoMatricula();
		for ($i=0; $i<count($res); $i++) {
		?>
			<option value="<?=$res[$i]['0020id']; ?>"><?=$res[$i]['0020desCurso']; ?>      <span style="float: right; text-align: right;"> | <?=$res[$i]['cantidad']; ?></span>	</option>

		<?php
		}

	}

	function listEstadoCivil(){
		$modelo = new EstadoCilvil();
		$res = $modelo->listEstadoCivil();
		if(count($res) == 0){
			echo "<option> Sin registros en el sistema </option>";
			exit;
		}

		foreach ($res as  $value) {
			?>
			<option value="<?=$value['003id']; ?>"><?=$value['003desEsCivil']; ?></option>
			<?php
		}
	}

	function lisRoles(){
		$model = new Rol();
		$data = $model->listarRoles();
		if(count($data) == 0){
			echo "<option> Sin registros en el sistema </option>";
			exit;
		}

		foreach ($data as $value) {
			
				?><option value="<?=$value[0]; ?>"><?=$value[1]; ?></option><?php
	
		}
	}





		?>

<?php


	class Pais{
		private $pconexion;
		private $p004id;
		private $p004desPais;

		function __construct(){
			$this->conexion=new Conexion();
		}

		function getAllPaises(){
			$m = null;
			$statement = $this->conexion->prepare("SELECT * FROM 004apais ");
			$statement->execute();
			while ($fila=$statement->fetch()) {
				$m[]=$fila;
			}
			$statement->closeCursor();
			return $m;

		}

		function setP004desPais($des){
			$this->p004desPais = $des;
		}

		function getP004desPais(){
			return $this->p004desPais();
		}

		function setPais($p004id,$p004desPais){
			$this->p004id = $p004id;
			$this->p004desPais=$p004desPais;
		}

		function setAddPais(){
			$m = null;
			$statement = $this->conexion->perpare("INSERT INTO 004desPais (004id, 004desPais) VALUES (NULL,:p004desPais)");
			$statement->bindParam(':p004desPais',$this->getP004desPais());
			if ($statement->execute()) {
				$m = 5;
			}else{
				$m = 1;
			}
			$statement->closeCursor();
			return $m;
		}

		function __destruct(){
			$this->conexion = null;
		}
	}

	class Materia{

		private $cn;
		function __construct(){
			$this->cn=new Conexion();
		}

		function listarMaterias(){

			$statement=$this->cn->prepare("SELECT * FROM 0016amateria");
			$statement->execute();
			$statement=$statement->fetchAll();
			return $statement;
		}



		function __destruct(){
			$this->cn=null;
		}
	}



	class Bloque{

		private $cn;
		function __construct(){
			$this->cn=new Conexion();
		}

		function listarBloques(){

			$statement=$this->cn->prepare("SELECT * FROM 0018abloque");
			$statement->execute();
			$statement=$statement->fetchAll();
			return $statement;
		}

		function getBloqueDescripcion($id){
			$statement = $this->cn->prepare("SELECT * FROM 0018abloque WHERE 0018id = :id ");
			$statement->execute(array("id" => $id));
			return $statement->fetch()[1];
		}



		function __destruct(){
			$this->cn=null;
		}
	}

	class Periodo{

		private $cn;
		function __construct(){
			$this->cn=new Conexion();
		}

		function listarPeriodo(){

			$statement=$this->cn->prepare("SELECT * FROM 0021aperiodo");
			$statement->execute();
			$statement=$statement->fetchAll();
			return $statement;
		}

		//comparar parametro descripcion con DB y devuelve la id de la desccripcion
		function getComparinDataBdDataFilePeriodo(	$descripcion ){
			$estado = [];
			$statement = $this->cn->prepare( "SELECT 0021id, lower(0021desPeriodo) FROM 0021aperiodo WHERE 0021desPeriodo = :0021desPeriodo" );
			if($statement->execute(array( ":0021desPeriodo"=>$descripcion ))){
				if($statement->rowCount() > 0){
					$estado= array( true , $statement->fetch(PDO::FETCH_ASSOC)['0021id'] );
				}else{
					$estado = array( false, "notData" );
				}
			}
			$statement->closeCursor();
			return $estado;
		}



		function __destruct(){
			$this->cn=null;
		}
	}

	class Departamentos
	{

		private $conexion;
		private $d005id;
		private $d005desDepartameto;
		private $d005pais;

		function __construct()
		{
			$this->conexion=new Conexion();
		}


		function setd005id($d005id){

			$this->d005id = $d005id;
		}
		function getD005id(){
			return $this->d005id;
		}


		function setD005desDepartameto($d005desDepartameto){
			$this->d005desDepartameto=$d005desDepartameto;
		}

		function setD005pais($d005pais){
			$this->d005pais=$d005pais;
		}

		function listarD($id){

			$sql="SELECT * FROM 005adepartamento where 005pais=:id";

			$statement=$this->conexion->prepare($sql);
			$statement->bindparam(":id",$id);
			$statement->execute();
			while ($fila=$statement->fetch()) {
				$row[]=$fila;
			}
			$statement->closeCursor();
			return $row;

		}


		function setAddDepartamento(){

			//aqui
			$sql1="SELECT * FROM 005adepartamento WHERE 005desDepartameto=:d005desDepartameto LIMIT 1";
			$statement1=$this->conexion->prepare($sql);
			$statement1->bindparam(":d005desDepartameto",strtolower($this->d005desDepartameto));
			$statement1->execute();
			if ($statement1->rowCount() > 0) {
				$m=9;
			}else{

				$sql="INSERT INTO 005adepartamento(005id, 005desDepartameto, 005pais) VALUES (null,:d005desDepartameto,:d005pais)";
				$statement=$this->conexion->prepare($sql);
				$statement->bindParam(":d005desDepartameto",strtolower($this->d005desDepartameto));
				$statement->bindParam(":d005pais",$this->d005pais);
				if($statement->execute())
				{
					$m=1;
				}else{
					$m=5;
				}
			}
			$statement1->closeCursor();
			$statement->closeCursor();
			return $m;

		}
		function __destruct(){
			$this->conexion=null;
		}
	}

	class TipoDocumento{
		private $conexion;

		function __construct()
		{
			$this->conexion=new Conexion();
		}
		function listarTD(){

			$sql="SELECT * FROM 0019atipdocumento";
			$statement=$this->conexion->prepare($sql);
			$statement->execute();

			while ($fila=$statement->fetch()) {
				$row[]=$fila;
			}
			$statement->closeCursor();
			return $row;
		}
		function __destruct(){
			$this->conexion=null;
		}

	}


	//aca
	class CiuMuni extends Departamentos{
		private $conexion;

		private $c006id;
		private $c006desCiudad;
		private $c006departamento;

		function __construct()
		{
			$this->conexion=new Conexion();
		}



		function setId($id){
			$this->c006id = $id;
		}
		function getId(){
			return $this->c006id;
		}

		function listarCM(){
			$row=null;
			$sql="SELECT * FROM 006aciudad where 006departamento=:id";
			$statement=$this->conexion->prepare($sql);
			$statement->bindparam(":id",$this->getId());
			$statement->execute();
			while ($fila=$statement->fetch()) {
				$row[]=$fila;
			}
			$statement->closeCursor();
			return $row;

		}


		function setAddCiudadBarrio($cdesCiudad){
			$m =null;
			$sql1="SELECT * FROM 006aciudad WHERE 006departamento=:d005desDepartameto LIMIT 1";
			$statement1=$this->conexion->prepare($sql);
			$statement1->bindparam(":c006desCiudad",strtolower($cdepartamento));
			$statement1->execute();
			if ($statement1->rowCount() > 0) {
				$m=9;
			}else{
			$sql = "INSERT INTO 006aciudad(006id, 006desCiudad, 006departamento) VALUES (NULL,:cdesCiudad,:cdepartamento)";
			$statement = $this->conexion->prepare($sql);
			$statement->bindParam(':cdesCiudad',$cdesCiudad);
			$statement->bindParam(':cdepartamento',$this->getD005id());
			if ($statement->execute()) {
				$m = 1;
			}else{
				$m = 5;
			}

		}
			$statement->closeCursor();
			$statement1->closeCursor();
			return $m;
		}
		function __destruct(){
			$this->conexion=null;
		}


	}

	class Barrio{
		private $conexion;

		function __construct()
		{
			$this->conexion=new Conexion();
		}
		function listarB($idCiudad){
			$row=null;
			$sql="SELECT * FROM 0010abarrio where 0010ciudad=:idCiudad";
			$statement=$this->conexion->prepare($sql);
			$statement->bindParam(":idCiudad",$idCiudad);
			$statement->execute();
			while ($fila=$statement->fetch()) {
				$row[]=$fila;
			}
			$statement->closeCursor();
			return $row;

		}

		function listBarrioAll(){
			$statement = $this->conexion->prepare("SELECT * FROM 0010abarrio");
			$statement->execute();
			$data = $statement->fetchAll();
			$statement->closeCursor();
			return $data;
		}

		function registrarBarrio($descripcion,$idciudad){
			$msg=null;
			$sql="SELECT * from 0010abarrio inner join 006aciudad on 0010ciudad=006id where 0010ciudad=:idciudad and  0010desBarrio like '%' :descripcion '%'";

			$statement=$this->conexion->prepare($sql);
			$statement->bindparam(":idciudad",$idciudad);
			$statement->bindparam(":descripcion",$descripcion);
			$statement->execute();
			if($statement->rowCount()>0){
				$msg=9;

			}else{
				$sql1="INSERT INTO 0010abarrio(0010desBarrio, 0010ciudad) VALUES (:descripcion,:idciudad)";
				$stmt=$this->conexion->prepare($sql1);
				$stmt->bindparam(":descripcion",$descripcion);
				$stmt->bindparam(":idciudad",$idciudad);
				if($stmt->execute()){

					$msg=1;

				}else{

					$msg=0;

				}
			}
			$statement->closeCursor();
			$stmt->closeCursor();
			return $msg;

		}

		function __destruct(){
			$this->conexion=null;
		}

	}

	Class Eps{

		private $conexion;

		function __construct()
		{
			$this->conexion=new Conexion();
		}

		function insEps($desc,$tel){
			$msg=null;

			$sql="SELECT * from 002aeps where 002desEps like '%' :descri '%'";
			$statement=$this->conexion->prepare($sql);
			$statement->bindparam(":descri",$desc);
			$statement->execute();
			if($statement->rowCount()>0){

				$msg=9;

			}else{

			$sql1="INSERT INTO 002aeps (002desEps, 002tel) VALUES (:descri,:tel)";
			$stmt=$this->conexion->prepare($sql1);
			$stmt->bindparam(":descri",$desc);
			$stmt->bindparam(":tel",$tel);

			if($stmt->execute()){

				$msg=1;

			}else{

				$msg=0;

			}
			$stmt->closeCursor();

		}
		$statement->closeCursor();
		return $msg;
		}

		function listarEps(){

			$sql="SELECT 002id, 002desEps FROM 002aeps WHERE 002estado=1";
			$statement=$this->conexion->prepare($sql);
			$statement->execute();
			while ($fila=$statement->fetch()) {
				$rows[]=$fila;
			}
			$statement->closeCursor();
			return $rows;

		}



		function __destruct(){

			$this->conexion=null;

		}
	}

		class Genero{

			private $conexion;

			function __construct()
			{
			$this->conexion=new Conexion();
			}

			function listarGenero(){
			$rows=null;
			$sql="SELECT * from 001agenero";
			$statement=$this->conexion->prepare($sql);
			$statement->execute();
			while($fila=$statement->fetch()){

				$rows[]=$fila;

			}
			$statement->closeCursor();
			return $rows;

			}
			function __destruct(){

				$this->conexion=null;

			}

		}


		class Sangre{

			private $conexion;

		function __construct()
		{
		$this->conexion=new Conexion();
		}

		function listarRh(){
		$rows=null;
		$sql="SELECT * from 0023rh";
		$statement=$this->conexion->prepare($sql);
		$statement->execute();
		while($fila=$statement->fetch()){

			$rows[]=$fila;

		}
		$statement->closeCursor();
		return $rows;

		}
		function __destruct(){

			$this->conexion=null;

		}

		}

		class Rol{

			private $conexion;

			function __construct()
			{
				$this->conexion=new Conexion();
			}

			function listarRoles(){
				$rows=null;
				$sql="SELECT * from 009apermisos";
				$statement=$this->conexion->prepare($sql);
				$statement->execute();
				while($fila=$statement->fetch()){

					$rows[]=$fila;

				}
				$statement->closeCursor();
				return $rows;

			}
			function __destruct(){

				$this->conexion=null;

			}

		}

	class Jornada{

		private $conexion;
		private $j0015id;
		private $j0015desJornada;

		function __construct(){

			$this->conexion=new Conexion();
		}

		function listarJornada(){
			$conexion= new Conexion();
			$rows=null;
			$sql="SELECT * from 0015ajornada";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while($fila=$statement->fetch()){
				$rows[]=$fila;
			}


			$statement->closeCursor();
			return $rows;

		}

		function __destruct(){
			$this->conexion=null;
		}

	}

	Class Sede{
		private $conexion;
		function __construct(){

			$this->conexion=new Conexion();
		}

		function listarSede(){
			$conexion= new Conexion();
			$rows=null;
			$sql="SELECT * from 0022asede";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while($fila=$statement->fetch()){
				$rows[]=$fila;
			}


			$statement->closeCursor();
			return $rows;

		}

		function __destruct(){
			$this->conexion=null;
		}

	}

Class Cursos{
	private $conexion;
		function __construct(){

			$this->conexion=new Conexion();
		}

		function listarCursos(){
			$conexion= new Conexion();
			$rows=null;
			$sql="SELECT * from 0020acurso where 0020estado=1 ";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while($fila=$statement->fetch()){
				$rows[]=$fila;
			}


			$statement->closeCursor();
			return $rows;

		}

		function listarCursoMatricula(){

			$statement=$this->conexion->prepare("SELECT 0020id,0020desCurso, count(0014curso) as cantidad from 0014amatriculados inner join 0020acurso on 0014curso=0020id where 0014anioActu=CURRENT_DATE group by 0014curso");
			$statement->execute();
			return $statement->fetchAll();

		}

		//comparar parametro descripcion con DB y devuelve la id de la desccripcion
		function getComparinDataBdDataFile(	$descripcion ){
			$estado = [];
			$statement = $this->conexion->prepare( "SELECT 0020id, lower(0020desCurso) FROM 0020acurso WHERE 0020desCurso = :0020desCurso" );
			if($statement->execute(array( ":0020desCurso"=>$descripcion ))){
				if($statement->rowCount() > 0){
					$estado= array( true , $statement->fetch(PDO::FETCH_ASSOC)['0020id'] );
				}else{
					$estado = array( false, "notData" );
				}
			}
			$statement->closeCursor();
			return $estado;
		}

		function __destruct(){
			$this->conexion=null;
		}

	}

	class cupos{
		private $cn;

		private $c0024id;
		private $c0024curso;
		private $c0024cursomax;
		private $c0024anio;
		function __construct(){
			$this->cn=new Conexion();
		}

		function setAll($c0024id,$c0024curso,$c0024cursomax,$c0024anio){
			$this->c0024id=$c0024id;
			$this->c0024curso=$c0024curso;
			$this->c0024cursomax=$c0024cursomax;
			$this->c0024anio=$c0024anio;
		}



		function __destruct(){
			$this->cn = null;
		}
	}

	class EstadoCilvil{
		private $e003id;
    private $e003desEsCivil;
		private $cn;
		function __construct(){
			$this->cn = new Conexion();
		}

		function listEstadoCivil(){
			$statement = $this->cn->prepare("SELECT 003id, 003desEsCivil FROM 003aestadocivil");
			$statement->execute();
			$data = $statement->fetchAll();
			$statement->closeCursor();
			return $data;
		}

		function addEstadoCivil(){

		}

		function deleteEstadoCivil(){

		}



		function __destruct(){
			$this->cn = null;
		}
	}




 ?>

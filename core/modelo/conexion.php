<?php

	class Conexion  extends PDO{


		function __construct(){
			try {
				parent::__construct("mysql:host=".HOST."; dbname=".DB.";",USER,PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET lc_time_names='es_ES'"));
				$this->exec("SET CHARACTER SET utf8");
				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				echo $e->getMessage();
			}

		}


	}


 ?>

<?php
class Conexion{
	private $conect;

	public function __construct(){
		$connectionString = "sqlsrv:Server=".DB_HOST."; Database =".DB_NAME;
		try{
			//$this->conect = new PDO("sqlsrv:Server=".DB_HOST."; Database = ".DB_NAME, DB_USER, DB_PASSWORD, array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true));
			$this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
			$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "conexión exitosa";
		}catch(PDOException $e){
			$this->conect = 'Error de conexión';
		    echo "ERROR: " . $e->getMessage();
		}
	}

	public function conect(){
		return $this->conect;
	}
}

?>
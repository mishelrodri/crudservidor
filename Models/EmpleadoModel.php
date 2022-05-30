<?php

class EmpleadoModel extends Mysql {

	public $intIdEmpleado;
	public $strDui;
	public $strNit;
	public $strNombre;
	public $strApellido;
	public $strDireccion;
	public $telefono;
	public $dia;
	public $mes;
	public $anio;
	public $intestado;
	public $intCargo;

	public function __construct() {
		parent::__construct();
	}

	public function getNewId() {
		$sql = "SELECT top 1 MAX(idempleado) as id FROM empleado  group by idempleado ORDER BY idempleado DESC";
		$request = $this->select($sql);

		if (isset($request["id"])) {
			$ultimo = intval($request["id"]);
		} else {
			$ultimo = 0;
		}
		$id = $ultimo + 1;
		return $id;
	}

	public function selectEmpleados() {

		//SELECCIONAR EmpleadoES
		$sql = "SELECT e.idempleado, e.dui, e.nombre, e.apellido, e.direccion, e.estado, e.idcargo, c.nombre as nombrecargo FROM empleado e INNER JOIN cargo c on c.idcargo=e.idcargo WHERE e.estado!=2";
		$request = $this->select_all($sql);
		return $request;
	}
	//para el combito :3
	public function selectCargos() {

		$sql = "SELECT * FROM cargo ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectempleadoid(int $idEmpleado) {
		//BUSCAR
		$this->intIdEmpleado = $idEmpleado;
		$sql = "SELECT e.idempleado, e.dui, e.nombre, e.apellido, e.direccion, e.estado, e.idcargo, c.nombre as nombrecargo FROM empleado e INNER JOIN cargo c on c.idcargo=e.idcargo WHERE idempleado = $this->intIdEmpleado";
		$request = $this->select($sql);
		return $request;
	}

	public function insertEmpleado(int $id, string $strDui, string $strNombre, string $strApellido, string $strDireccion, int $intestado, int $intCargo) {

		$return = "";

		$this->strDui = $strDui;
		$this->strNombre = $strNombre;
		$this->strApellido = $strApellido;
		$this->strDireccion = $strDireccion;

		$this->intestado = $intestado;
		$this->intCargo = $intCargo;

		$sql = "SELECT * FROM empleado WHERE dui = '{$this->strDui}'";
		$request = $this->select_all($sql);

		if (empty($request)) //Dui
		{

			$query_insert = "INSERT INTO empleado(idempleado, dui, nombre, apellido, direccion, estado, idcargo) VALUES(?,?,?,?,?,?,?)";

			$arrData = array($id, $this->strDui, $this->strNombre, $this->strApellido, $this->strDireccion, $this->intestado, $this->intCargo);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;

		} else {
			$return = "exist";
		}
		return $return;
	}

	//ACTUALIZAR
	public function updateEmpleado(int $id, string $strDui, string $strNombre, string $strApellido, string $strDireccion, int $intestado, int $intCargo) {

		$this->intIdEmpleado = $id;
		$this->strDui = $strDui;

		$this->strNombre = $strNombre;
		$this->strApellido = $strApellido;
		$this->strDireccion = $strDireccion;

		$this->intestado = $intestado;
		$this->intCargo = $intCargo;

		$sql = "SELECT * FROM empleado WHERE dui ='$this->strDui' AND idempleado != $this->intIdEmpleado";
		$request = $this->select_all($sql);

		if (empty($request)) {

			// UPDATE empleado SET dui=?,nombre=?,apellido=?,nit=?,direccion=?,telefono=?,dia=?,mes=?,anio=?,estado=?,idcargo=? WHERE idempleado

			$sql = "UPDATE empleado SET dui=?,nombre=?,apellido=?,direccion=?,estado=?,idcargo=? WHERE idempleado = $this->intIdEmpleado ";

			$arrData = array($this->strDui, $this->strNombre, $this->strApellido, $this->strDireccion, $this->intestado, $this->intCargo);

			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}

		return $request;
	}

	//ELIMINAR
	public function deleteEmpleado(int $idEmpleado, int $estado) {
		$this->intestado = $estado;

		$this->intIdEmpleado = $idEmpleado;

		$sql = "UPDATE empleado SET estado=? WHERE idempleado = $this->intIdEmpleado ";

		$arrData = array($this->intestado);

		$request = $this->update($sql, $arrData);

		if ($request) {
			$request = 'ok';
		} else {
			$request = 'error';
		}

		return $request;
	}
}
?>
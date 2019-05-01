<?php

class Application {

	protected $module;
	protected $controller;
	protected $model;

	function __construct() {
		$this->module = $this->getModule();
		if($this->module) {
			$module_path = $_SERVER['DOCUMENT_ROOT'] . '/../src/modules/' . $this->module['module_name'];
			require_once $module_path . '/' . $this->module['module_controller'] . '.php';
			$this->controller = new $this->module['module_controller'];
		} else {
			echo "Error; Unknown Module.";
		}
	}

	protected function getModule() {
		try {
			$url = $this->parseUrl();
			if($url[0]) {
				$this->module = $url[0];
			} else {
				$this->module = 'start';
			}
			$stmt = $this->dbConnect()->prepare("SELECT * FROM modules WHERE module_name=:module");
			$stmt->execute(array(":module"=>$this->module));
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result > 0 ) {
				return $result;
			} else {
				return;
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}


	protected function parseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	protected function dbConnect() {
		try {
			$dbconfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/../src/config/database.ini');
			$db_connection = new PDO("mysql:host={$dbconfig['db_host']}; dbname={$dbconfig['db_name']}", $dbconfig['db_user'], $dbconfig['db_pass']);
			$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $db_connection;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	protected function loadModel($module) {
		$module_path = $_SERVER['DOCUMENT_ROOT'] . '/../src/modules/' . $module['module_name'];
		$this->model = require_once $module_path . '/' . $module['module_model'] . '.php';
		return new $module['module_model'];
	}

	protected function loadView($module, $data = []) {
		$module_path = $_SERVER['DOCUMENT_ROOT'] . '/../src/modules/' . $module['module_name'];
		require_once $module_path . '/' . $module['module_view'] . '.php';
	}

}
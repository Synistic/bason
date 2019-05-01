<?php

class StartController extends Application {
	private $db;

	function __construct() {
		$this->db = $this->dbConnect();

		$module = $this->getModule();

		$data = array();
		$data['test'] = 1;
		$this->loadView($module, $data);
	}
}
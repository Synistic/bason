<?php

class AdminboardController extends Application {
	private $db;

	function __construct() {
		$this->db = $this->dbConnect();

		$data = array();

		$module = $this->getModule();

		$this->loadView($module, $data);
	}
}
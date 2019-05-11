<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/helpers/Database.php';

class AdminboardModel extends Database {

	private $db;

	function __construct() {
		$this->db = $this->dbConnect();
	}

}
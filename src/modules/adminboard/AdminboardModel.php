<?php

class AdminboardModel extends Application {
	private $db;
		
	function __construct() {
		$this->db = $this->dbConnection();
	}
}
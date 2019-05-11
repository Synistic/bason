<?php

class StartModel extends Application {

	private $db;

	function __construct() {
		$this->db = $this->dbConnect();
	}
}
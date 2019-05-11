<?php

class StartModel extends Application {

	private $db;

	function __construct() {
		$this->db = $this->dbConnect();
	}

	public function test() {
		$stmt = $this->db->prepare("SELECT * FROM modules");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
}
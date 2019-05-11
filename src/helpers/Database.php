<?php

class Database {

	public function dbConnect() {
		$dbconfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/src/config/database.ini');
		try {
			$connection = new PDO("mysql:host={$dbconfig['db_host']}; dbname={$dbconfig['db_name']}", $dbconfig['db_user'], $dbconfig['db_pass']);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $connection;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}
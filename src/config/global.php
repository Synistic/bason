<?php

//display error [only for testing]
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session handling
if(!isset($_SESSION)) {
	$session_name = "corputy_sessid";
	session_name($session_name);
	session_start();
} else {
	session_regenerate_id();
}
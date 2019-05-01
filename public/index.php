<?php

ini_set('display_errors', 1); //remove this if you want
ini_set('display_startup_errors', 1); //remove this if you want
error_reporting(E_ALL); //remove this if you want

require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/core/Application.php';

$app = new Application();
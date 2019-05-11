<?php

class StartController extends Application {

	function __construct() {
		$module = $this->getModule();
		$model = $this->loadModel($module);
		$data = array();
		$this->loadView($module, $data);
	}

}
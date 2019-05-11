<?php

class StartController extends Application {

	function __construct() {
		$module = $this->getModule();
		$model = $this->loadModel($module);
		print_r($model->test());
		$data = array();
		$this->loadView($module, $data);
	}

}
<?php

/*
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/Session.php';
require_once __DIR__ . '/../controllers/MainController.php';

/**
 * Description of App
 */
class App {
	public $params;
	
	public function __construct() {
		$this->params = require_once __DIR__ . '/../config/params.php';

	        Session::init();
		
		$this->params['results'] = Session::get('results');
		
		if (empty($this->params['results']['reliability'])) {
			foreach($this->params['psychics'] as $key => $fio) {
				$this->params['results']['reliability'][$key] = 0;
			}
		}
		
		$controller = new MainController($this->params);
		$controller->index();
	}

}

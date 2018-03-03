<?php

/*
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

require_once 'classes\Controller.php';
require_once 'classes\Session.php';
require_once 'controllers\MainController.php';

/**
 * Description of App
 */
class App {
	public $params;
	
	public function __construct() {
		$this->params = require_once __DIR__ . '/../config/params.php';

	        Session::init();
		
		$this->params['results'] = Session::get('results');
		
		$controller = new MainController($this->params);
		$controller->index();
	}

}

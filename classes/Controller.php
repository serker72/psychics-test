<?php

/*
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

require_once __DIR__ . '/View.php';

/**
 * Description of Controller
 */
class Controller {

	public $params;

	public function __construct($params) {
		$this->params = $params;
		$this->view = new View($params);
	}

}

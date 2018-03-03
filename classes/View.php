<?php

/*
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

/**
 * Description of View
 */
class View {

	public $params;
	
	public function __construct($params) {
		$this->params = $params;
	}

	public function render($name, $noInclude = false) {
		if ($noInclude) {
			require_once 'views/' . $name . '.php';
		} else {
			require_once 'views/header.php';
			require_once 'views/' . $name . '.php';
			require_once 'views/footer.php';
		}
	}

}

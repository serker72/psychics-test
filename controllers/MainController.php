<?php

/*
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */


/**
 * Description of MainController
 */
class MainController extends Controller {

	public function index() {
		if (isset($_POST['getGuesses'])) {
			$this->params['results']['guesses'] = [];
			
			foreach($this->params['psychics'] as $key => $fio) {
				$this->params['results']['guesses'][$key] = mt_rand(10, 99);
			}

			Session::set('results', $this->params['results']);
			
			$this->view->params = $this->params;
			return $this->view->render('table', true);
		} elseif (isset($_POST['calculateReliability'])) {
			$result = $_POST['calculateReliability'];
			foreach($this->params['psychics'] as $key => $fio) {
				if ($this->params['results']['guesses'][$key] == $result) {
					$this->params['results']['reliability'][$key]++;
				} else {
					$this->params['results']['reliability'][$key]--;
				}
			}
			
			Session::set('results', $this->params['results']);
			
			$this->view->params = $this->params;
			return $this->view->render('table', true);
		} elseif (isset($_POST['saveResult'])) {
			$result = [
				'number' => $_POST['saveResult'],
				'results' => [],
			];
			foreach($this->params['psychics'] as $key => $fio) {
				$result['results'][$key] = $this->params['results']['guesses'][$key];
			}
			$this->params['results']['testing'][] = $result;
			
			Session::set('results', $this->params['results']);
			
			$this->view->params = $this->params;
			return $this->view->render('history', true);
		} elseif (isset($_POST['clearHistory'])) {
			$this->params['results']['testing'] = [];
			foreach($this->params['psychics'] as $key => $fio) {
				$this->params['results']['reliability'][$key] = 0;
			}
			$this->params['results']['guesses'] = [];
			
			Session::set('results', $this->params['results']);
			
			$this->view->params = $this->params;
			return $this->view->render('history', true);
		} elseif (isset($_POST['clearReliability'])) {
			foreach($this->params['psychics'] as $key => $fio) {
				$this->params['results']['reliability'][$key] = 0;
			}
			$this->params['results']['guesses'] = [];
			
			Session::set('results', $this->params['results']);
			
			$this->view->params = $this->params;
			return $this->view->render('table', true);
		} else {
			$this->view->params = $this->params;
			return $this->view->render('index');
		}
	}

}

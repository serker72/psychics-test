<?php

/* 
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

?>
<div class="panel panel-primary reliability">
	<div class="panel-heading">
		<h4>Тестирование экстрасенсов</h4>
	</div>
	<div class="panel-body">
		<div class="row current">
			<div class="col-md-2 guessed-number-title">
				Загаданное<br>число
			</div>
			<div class="col-md-1">
				<span class="guessed-number"></span>
			</div>
			<div class="col-md-2">
				<button id="btn-guess-number" class="btn btn-primary btn-block">Загадать число</button>
			</div>
			<div class="col-md-2">
				<button id="btn-get-guesses" class="btn btn-success btn-block" disabled="disabled">Получить догадки</button>
			</div>
			<div class="col-md-3">
				<button id="btn-calculate-reliability" class="btn btn-info btn-block" disabled="disabled">Рассчитать достоверность</button>
			</div>
			<div class="col-md-2">
				<button id="btn-clear-history" class="btn btn-success btn-danger" <?= !empty($this->params['results']['testing']) ? '' : 'disabled="disabled"' ?>>Очистить историю</button>
			</div>
		</div>
		<table id="table-current" class="table table-responsive table-striped">
			<thead>
				<tr>
					<th>Экстрасенс</th>
					<th>Догадка экстрасенса</th>
					<th>Уровень достоверности</th>
				</tr>
			</thead>
			<tbody>
				<?= $this->render('table', true) ?>
			</tbody>
		</table>
	</div>
</div>

<div class="panel panel-success testing">
	<div class="panel-heading">
		<h4>История тестирования экстрасенсов</h4>
	</div>
	<div class="panel-body">
		<table id="table-history" class="table table-responsive table-striped">
			<thead>
				<tr>
					<th>Загаданное число</th>
					<th>Экстрасенс</th>
					<th>Догадка экстрасенса</th>
				</tr>
			</thead>
			<tbody>
				<?= $this->render('history', true) ?>
			</tbody>
		</table>
	</div>
</div>

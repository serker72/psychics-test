/* 
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

// Возвращает случайное целое число между min (включительно) и max (не включая max)
function getRandomInt(min, max) {
	return Math.floor(Math.random() * (max - min)) + min;
}


$(document).ready(function(){
	// Обработкчик нажатия на кнопку "Загадать число"
	$('#btn-guess-number').on('click', function () {
		var guessNumber = getRandomInt(10, 100);
		$('span.guessed-number').html(guessNumber);
		$('#btn-guess-number').attr('disabled', 'disabled');
		$('#btn-get-guesses').removeAttr('disabled');
	});
	
	// Обработкчик нажатия на кнопку "Получить догадки"
	$('#btn-get-guesses').on('click', function () {
		var url = location.href;
		$('#btn-get-guesses').attr('disabled', 'disabled');
		$('#btn-calculate-reliability').removeAttr('disabled');
		
		// Запрос догадок
		$.post(url, {getGuesses: 1}, function (data) {
			$('#table-current > tbody').empty();
			$('#table-current > tbody').html(data);
		});
	});
	
	
	// Обработкчик нажатия на кнопку "Рассчитать достоверность"
	$('#btn-calculate-reliability').on('click', function () {
		var url = location.href;
		$('#btn-calculate-reliability').attr('disabled', 'disabled');
		$('#btn-guess-number').removeAttr('disabled');
		
		// Рассчитать достоверность
		$.post(url, {calculateReliability: $('span.guessed-number').html()}, function (data) {
			$('#table-current > tbody').empty();
			$('#table-current > tbody').html(data);
			
			$.post(url, {saveResult: $('span.guessed-number').html()}, function (data) {
				$('#btn-clear-history').removeAttr('disabled');
				$('#table-history > tbody').empty();
				$('#table-history > tbody').html(data);
			});
		});
	});
	
	// Обработкчик нажатия на кнопку "Очистить"
	$('#btn-clear-history').on('click', function () {
		var url = location.href;
		// Рассчитать достоверность
		$.post(url, {clearHistory: 1}, function (data) {
			$('#btn-clear-history').attr('disabled', 'disabled');
			$('#table-history > tbody').empty();
			$('#table-history > tbody').html(data);
			
			$.post(url, {clearReliability: 1}, function (data) {
				$('span.guessed-number').html('');
				$('#table-current > tbody').empty();
				$('#table-current > tbody').html(data);
			});
		});
	});
});

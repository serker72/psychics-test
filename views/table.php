<?php

/* 
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

?>
<? if (!empty($this->params['psychics'])): ?>
	<? foreach($this->params['psychics'] as $key => $fio): ?>
	<tr>
		<td><?= $fio ?></td>
		<td class="text-center"><?= !empty($this->params['results']['guesses'][$key]) ? $this->params['results']['guesses'][$key] : '0' ?></td>
		<td class="text-center"><?= !empty($this->params['results']['reliability'][$key]) ? $this->params['results']['reliability'][$key] : '0' ?></td>
	</tr>
	<? endforeach; ?>
<? endif; ?>

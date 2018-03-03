<?php

/* 
 * Psychics Test
 * Author: Kerimov Sergey
 * E-Mail: serker72@gmail.com
 */

?>
<? if (!empty($this->params['results']['testing'])): ?>
	<? foreach($this->params['results']['testing'] as $test): ?>
		<tr>
			<td  class="guessed-number" rowspan="<?= count($this->params['psychics']) ?>"><?= $test['number'] ?></td>
			<? foreach($this->params['psychics'] as $key => $fio): ?>
				<?= ($key > 1) ? '<tr>' : '' ?>
				<td><?= $fio ?></td>
				<td class="text-center"><?= !empty($test['results'][$key]) ? $test['results'][$key] : '' ?></td>
				<?= ($key < count($this->params['psychics'])) ? '</tr>' : '' ?>
			<? endforeach; ?>
		</tr>
	<? endforeach; ?>
<? endif; ?>

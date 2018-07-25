<div style="margin-left: <?php echo e((15 * ($level - 1))); ?>px">
	<h4>
		<?php echo /*$level.*/ucfirst(str_replace(['_', '-'], ' ', trim($header))); ?>

		<a class="toggle-inputs" href="#"><i class="glyphicon glyphicon-plus-sign"></i></a>
	</h4>
	<div class="lang-input-box" style="margin-left: 10px;">
		<?php echo $langfile->displayInputs($item, $parents, $header, $level); ?>

	</div>
</div>

<div class="form-group">
<label for="<?php echo e($key); ?>" class="col-sm-2 control-label"><?php echo e(str_replace(['_', '-'], ' ', $key)); ?></label>
	<div class="hidden-sm hidden-xs col-md-5">
		<div class="well well-sm">
			<?php
			if (count($parents)) {
				$parents_array = implode('.', $parents);
				$string_text = trans($lang_file_name . '.' . $parents_array . '.' . $key);
			} else {
				$string_text = trans($lang_file_name . '.' .$key);
			}
			echo htmlentities($string_text);
			?>
		</div>
	</div>
	<div class="col-sm-10 col-md-5">
		<?php if(preg_match('/(\|)/', $item)): ?>
			<?php
			$chuncks = explode('|', $item);
			?>

			<div style="margin-left: 15px;">
			<?php $__currentLoopData = $chuncks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $chunck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				preg_match('/^({\w}|\[[\w,]+\])([\w\s:]+)/', trim($chunck), $m);
				?>
				<?php if(empty($m)): ?>
					<label for="<?php echo e($chunck); ?>" class="col-sm-2 control-label"><?php echo e((!$k ? trans('admin.language.singular') : trans('admin.language.plural')).":"); ?></label>
					<textarea name="<?php echo e((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[after][]"); ?>" class="form-control" rows="2"> <?php echo e($chunck); ?> </textarea>
					<br>
				<?php else: ?>
					<label for="<?php echo e($chunck); ?>" class="col-sm-2 control-label"><?php echo e((!$k ? trans('admin.language.singular') : trans('admin.language.plural'))." ($m[1]):"); ?></label>
					<input type="hidden" name="<?php echo e((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[before][]"); ?>" value="<?php echo e($m[1]); ?>">
					<textarea name="<?php echo e((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[after][]"); ?>" class="form-control" rows="2"> <?php echo e($m[2]); ?> </textarea>
					<br>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php else: ?>
			<textarea name="<?php echo e((empty($parents) ? $key : implode('__', $parents)."__{$key}")); ?>" class="form-control" rows="2"> <?php echo e($item); ?> </textarea>
			<br>
		<?php endif; ?>
	</div>
</div>
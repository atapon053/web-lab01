<?php $__env->startSection('header'); ?>
	<section class="content-header">
	  <h1>
        <span class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></span>
        <small><?php echo e(trans('backpack::crud.add').' '.$crud->entity_name); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo e(url(config('backpack.base.route_prefix'), 'dashboard')); ?>"><?php echo e(trans('backpack::crud.admin')); ?></a></li>
	    <li><a href="<?php echo e(url($crud->route)); ?>" class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></a></li>
	    <li class="active"><?php echo e(trans('backpack::crud.add')); ?></li>
	  </ol>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<form action="<?php echo request()->url(); ?>" method="GET">
		<strong>Layout: <?php echo _i('Hello'); ?></strong>
		<select name="layouts" id="layouts">
			<option value="2" <?php echo request()->get('layouts') == 2 ? 'selected' : ''; ?>>2-column</option>
			<option value="3" <?php echo request()->get('layouts') == 3 ? 'selected' : ''; ?>>3-column</option>
			<option value="4" <?php echo request()->get('layouts') == 4 ? 'selected' : ''; ?>>4-column</option>
		</select><br><br>
	</form>

	<?php if(request()->get('layouts') == 2): ?>
		<?php echo $__env->make('vendor.backpack.layout_customs.2-column', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php else: ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- Default box -->
				<?php if($crud->hasAccess('list')): ?>
					<a href="<?php echo e(url($crud->route)); ?>"><i class="fa fa-angle-double-left"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span></a><br><br>
				<?php endif; ?>

				<?php echo $__env->make('crud::inc.grouped_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<form method="post"
					  action="<?php echo e(url($crud->route)); ?>"
					  <?php if($crud->hasUploadFields('create')): ?>
					  enctype="multipart/form-data"
						<?php endif; ?>
				>
					<?php echo csrf_field(); ?>

					<div class="box">

						<div class="box-header with-border">
							<h3 class="box-title"><?php echo e(trans('backpack::crud.add_a_new')); ?> <?php echo e($crud->entity_name); ?></h3>
						</div>
						<div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
							<!-- load the view from the application if it exists, otherwise load the one in the package -->
							<?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
								<?php echo $__env->make('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php else: ?>
								<?php echo $__env->make('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endif; ?>
						</div><!-- /.box-body -->
						<div class="box-footer">

							<?php echo $__env->make('crud::inc.form_save_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						</div><!-- /.box-footer-->

					</div><!-- /.box -->
				</form>
			</div>
		</div>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('after_scripts'); ?>
	<script type="text/javascript">
        $(function () {
            $("#layouts").change(function () {
                if(this.value != 0) {
                    this.form.submit();
                }
            })
        });
	</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
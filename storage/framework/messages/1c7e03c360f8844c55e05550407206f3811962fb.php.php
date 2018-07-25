<?php if($crud->hasAccess('list')): ?>
    <a href="<?php echo e(url($crud->route)); ?>"><i class="fa fa-angle-double-left"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span></a><br><br>
<?php endif; ?>
<div class="box">
    <div class="row">
        <div class="box-body">

            <div class="col-sm-6">
                <?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
                    <?php echo $__env->make('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <?php echo $__env->make('vendor.backpack.crud.inc.form_save_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-sm-6">
                One of two columns
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title"><?php echo e(trans('backpack::base.register')); ?></div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('backpack.auth.register')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"><?php echo e(trans('backpack::base.name')); ?></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has(backpack_authentication_column()) ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"><?php echo e(config('backpack.base.authentication_column_name')); ?></label>

                            <div class="col-md-6">
                                <input type="<?php echo e(backpack_authentication_column()=='email'?'email':'text'); ?>" class="form-control" name="<?php echo e(backpack_authentication_column()); ?>" value="<?php echo e(old(backpack_authentication_column())); ?>">

                                <?php if($errors->has(backpack_authentication_column())): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first(backpack_authentication_column())); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"><?php echo e(trans('backpack::base.password')); ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"><?php echo e(trans('backpack::base.confirm_password')); ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo e(trans('backpack::base.register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title"><?php echo e(trans('backpack::base.login')); ?></div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('backpack.auth.login')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group<?php echo e($errors->has($username) ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"><?php echo e(config('backpack.base.authentication_column_name')); ?></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="<?php echo e($username); ?>" value="<?php echo e(old($username)); ?>">

                                <?php if($errors->has($username)): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first($username)); ?></strong>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> <?php echo e(trans('backpack::base.remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(trans('backpack::base.login')); ?>

                                </button>

                                <?php if(backpack_users_have_email()): ?>
                                <a class="btn btn-link" href="<?php echo e(route('backpack.auth.password.reset')); ?>"><?php echo e(trans('backpack::base.forgot_your_password')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
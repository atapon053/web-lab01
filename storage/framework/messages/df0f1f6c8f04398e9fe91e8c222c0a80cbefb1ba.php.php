<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>

<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li>
            <form action="<?php echo request()->url(); ?>" method="get">
            <select name="local" id="local" class="form-control">
                <option value="">--Select--</option>
                <?php $__currentLoopData = Config::get('laravel-gettext.supported-locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo $locale; ?>"><?php echo $locale; ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </form>
        </li>
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
      <?php if(config('backpack.base.setup_auth_routes')): ?>
        <?php if(backpack_auth()->guest()): ?>
            <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/login')); ?>"><?php echo e(_i('Login')); ?></a></li>
            <?php if(config('backpack.base.registration_open')): ?>
            <li><a href="<?php echo e(route('backpack.auth.register')); ?>"><?php echo e(trans('backpack::base.register')); ?></a></li>
            <?php endif; ?>
        <?php else: ?>
            <li><a href="<?php echo e(route('backpack.auth.logout')); ?>"><i class="fa fa-btn fa-sign-out"></i> <?php echo e(trans('backpack::base.logout')); ?></a></li>
        <?php endif; ?>
       <?php endif; ?>
       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
<?php $__env->startPush('after_scripts'); ?>
    <script type="text/javascript">
        $(function () {
            $("#local").change(function () {
                if(this.value != 0) {
                    this.form.submit();
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

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
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
      <?php if(config('backpack.base.setup_auth_routes')): ?>
        <?php if(backpack_auth()->guest()): ?>
            <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/login')); ?>"><?php echo e(trans('backpack::base.login')); ?></a></li>
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

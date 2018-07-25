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
    <?php echo dump(app()->getLocale()); ?>

    <ul class="nav navbar-nav">
        <li class="navbar-nav">
            <ul class="nav navbar-nav">
                <?php $__empty_1 = true; $__currentLoopData = getLangs()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo request()->url() .'?locale='. $locale->abbr; ?>" name="locale" id="locale" data-locale="<?php echo $locale->abbr; ?>">
                        <img src="<?php echo asset($locale->flag); ?>" alt="" style="max-width: 35px">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </ul>
        </li>
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
            <li>
                <a href="<?php echo e(route('backpack.auth.logout')); ?>"><i class="fa fa-btn fa-sign-out">
                    </i> <?php echo e(trans('backpack::base.logout')); ?></a>
            </li>
        <?php endif; ?>
       <?php endif; ?>
       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>


    
        
            
            

        
    


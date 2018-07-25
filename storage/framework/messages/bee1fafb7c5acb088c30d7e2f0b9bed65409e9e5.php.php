<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="<?php echo e(backpack_url('dashboard')); ?>"><i class="fa fa-dashboard"></i> <span><?php echo e(trans('backpack::base.dashboard')); ?></span></a></li>
<!-- Users, Roles Permissions -->
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin') . '/user')); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin') . '/role')); ?>"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin') . '/permission')); ?>"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<li><a href="<?php echo e(backpack_url("elfinder")); ?>"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>News</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="<?php echo e(backpack_url('article')); ?>"><i class="fa fa-newspaper-o"></i> <span>Articles</span></a></li>
        <li><a href="<?php echo e(backpack_url('category')); ?>"><i class="fa fa-list"></i> <span>Categories</span></a></li>
        <li><a href="<?php echo e(backpack_url('tag')); ?>"><i class="fa fa-tag"></i> <span>Tags</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-user"></i> <span>History</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="<?php echo backpack_url('profile'); ?>"><i class="fa fa-address-card"></i> <span>Profile</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/language')); ?>"><i class="fa fa-flag-checkered"></i> Languages</a></li>
        <li><a href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/language/texts')); ?>"><i class="fa fa-language"></i> Site texts</a></li>
    </ul>
</li>
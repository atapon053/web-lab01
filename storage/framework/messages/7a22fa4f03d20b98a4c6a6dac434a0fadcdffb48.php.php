<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form action="<?php echo route('user.create'); ?>" method="POST" class="form-horizontal">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <label for="name"><strong>User</strong></label>
                            <select name="user_id" id="user_id" class="form-control">
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="">No Data</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="name"><strong>FullName</strong></label>
                            <input type="text" class="form-control" name="name" value="<?php echo old('name'); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn-primary"><?php echo _i('Submit'); ?></button>
                </div>
            </form>

            <?php if($test_models->isNotEmpty()): ?>
                <h1>Data from database connection two</h1>
                <?php $__currentLoopData = $test_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="name"><strong>User:</strong> <?php echo array_get($test_model, 'user.name'); ?></label>
                        </div>
                        <div class="col-sm-6">
                            <label for="name"><strong>FullName:</strong> <?php echo $test_model->name; ?></label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <form action="<?php echo request()->url(); ?>" method="get">
                <div class="col-sm-6">
                    <label for="name"><strong>Lang</strong></label>
                    <select name="local" id="local" class="form-control">
                        <option value="">--Select--</option>
                        <?php $__currentLoopData = Config::get('laravel-gettext.supported-locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo $locale; ?>"><?php echo $locale; ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
                        
                        
                        
                    
                </div>
            </form>
        </div>
    </body>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function () {
        $("#local").change(function () {
            if(this.value != 0) {
                this.form.submit();
            }
        })
    })
</script>

</html>

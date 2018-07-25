<div id="saveActions" class="form-group">

    <div class="btn-group">
        <button type="submit" class="btn btn-success">
            <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
            <span data-value="<?php echo e($saveAction['active']['value']); ?>"><?php echo e($saveAction['active']['label']); ?></span>
        </button>
    </div>

    <a href="<?php echo e(url($crud->route)); ?>" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;<?php echo e(trans('backpack::crud.cancel')); ?></a>
</div>
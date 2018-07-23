@if ($crud->hasAccess('list'))
    <a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a><br><br>
@endif
<div class="box">
    <div class="row">
        <div class="box-body">

            <div class="col-sm-6">
                @if(view()->exists('vendor.backpack.crud.form_content'))
                    @include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
                @else
                    @include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
                @endif

                @include('vendor.backpack.crud.inc.form_save_buttons')
            </div>
            <div class="col-sm-6">
                One of two columns
            </div>
        </div>
    </div>
</div>
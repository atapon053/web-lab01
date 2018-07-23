@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
        <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
        <small>{{ trans('backpack::crud.add').' '.$crud->entity_name }}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.add') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
	<form action="{!! request()->url() !!}" method="GET">
		<strong>Layout: {!! _i('Hello') !!}</strong>
		<select name="layouts" id="layouts">
			<option value="2" {!! request()->get('layouts') == 2 ? 'selected' : '' !!}>2-column</option>
			<option value="3" {!! request()->get('layouts') == 3 ? 'selected' : '' !!}>3-column</option>
			<option value="4" {!! request()->get('layouts') == 4 ? 'selected' : '' !!}>4-column</option>
		</select><br><br>
	</form>

	@if(request()->get('layouts') == 2)
		@include('vendor.backpack.layout_customs.2-column')
	@else
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- Default box -->
				@if ($crud->hasAccess('list'))
					<a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a><br><br>
				@endif

				@include('crud::inc.grouped_errors')
				<form method="post"
					  action="{{ url($crud->route) }}"
					  @if ($crud->hasUploadFields('create'))
					  enctype="multipart/form-data"
						@endif
				>
					{!! csrf_field() !!}
					<div class="box">

						<div class="box-header with-border">
							<h3 class="box-title">{{ trans('backpack::crud.add_a_new') }} {{ $crud->entity_name }}</h3>
						</div>
						<div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
							<!-- load the view from the application if it exists, otherwise load the one in the package -->
							@if(view()->exists('vendor.backpack.crud.form_content'))
								@include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
							@else
								@include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
							@endif
						</div><!-- /.box-body -->
						<div class="box-footer">

							@include('crud::inc.form_save_buttons')

						</div><!-- /.box-footer-->

					</div><!-- /.box -->
				</form>
			</div>
		</div>
	@endif

@endsection
@push('after_scripts')
	<script type="text/javascript">
        $(function () {
            $("#layouts").change(function () {
                if(this.value != 0) {
                    this.form.submit();
                }
            })
        });
	</script>
@endpush


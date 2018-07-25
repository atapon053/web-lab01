@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{_i('dashboard') }}<small>{{ _i('The first page you see after login') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{!! _i('Login status') !!}</div>
                </div>

                <div class="box-body">{!! _i('You are logged in!') !!}</div>
            </div>
        </div>
    </div>
@endsection

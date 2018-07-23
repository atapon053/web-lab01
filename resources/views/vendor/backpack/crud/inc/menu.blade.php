<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>

<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        {{--<li>--}}
            {{--<form action="{!! request()->url() !!}" method="get" class="form-horizontal">--}}
            {{--<select name="local" id="local" class="form-control">--}}
                {{--<option value="">--Select--</option>--}}
                {{--@foreach(Config::get('laravel-gettext.supported-locales') as $key =>  $locale)--}}
                    {{--<option value="{!! $locale !!}" {!! \Illuminate\Support\Facades\Session::get('locale') == $locale ? 'selected' : '' !!}>{!! $locale !!}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
            {{--</form>--}}
        {{--</li>--}}
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
      @if (config('backpack.base.setup_auth_routes'))
        @if (backpack_auth()->guest())
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ _i('Login') }}</a></li>
            @if (config('backpack.base.registration_open'))
            <li><a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a></li>
            @endif
        @else
            <li><a href="{{ route('backpack.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li>
        @endif
       @endif
       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
@push('after_scripts')
    <script type="text/javascript">
        $(function () {
            $("#local").change(function () {
                if(this.value != 0) {
                    this.form.submit();
                }
            })
        });
    </script>
@endpush

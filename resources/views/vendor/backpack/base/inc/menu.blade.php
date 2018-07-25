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
    {!! dump(app()->getLocale()) !!}
    <ul class="nav navbar-nav">
        <li class="navbar-nav">
            <ul class="nav navbar-nav">
                @forelse(getLangs()->get() as $key => $locale)
                    <a href="{!! request()->url() .'?locale='. $locale->abbr !!}" name="locale" id="locale" data-locale="{!! $locale->abbr !!}">
                        <img src="{!! asset($locale->flag) !!}" alt="" style="max-width: 35px">
                    </a>
                @empty
                @endforelse
            </ul>
        </li>
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->
      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
      @if (config('backpack.base.setup_auth_routes'))
        @if (backpack_auth()->guest())
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ _i('Login') }}</a></li>
            @if (config('backpack.base.registration_open'))
            <li><a href="{{ route('backpack.auth.register') }}">{{ _i('Register') }}</a></li>
            @endif
        @else
            <li>
                <a href="{{ route('backpack.auth.logout') }}"><i class="fa fa-btn fa-sign-out">
                    </i> {{ _i('Logout') }}</a>
            </li>
        @endif
       @endif
       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>

@push('after_scripts')
    <script type="text/javascript">
        $('#locale').on('click', function (e) {
            // location.reload();
            {{--var locale = $("#locale").data("locale");--}}
            {{--console.log(locale);--}}

        })
    </script>
@endpush

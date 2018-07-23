<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form action="{!! route('user.create') !!}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <label for="name"><strong>User</strong></label>
                            <select name="user_id" id="user_id" class="form-control">
                                @forelse($users as $user)
                                    <option value="{!! $user->id !!}">{!! $user->name !!}</option>
                                @empty
                                    <option value="">No Data</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="name"><strong>FullName</strong></label>
                            <input type="text" class="form-control" name="name" value="{!! old('name') !!}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn-primary">{!! _i('Submit') !!}</button>
                </div>
            </form>

            @if($test_models->isNotEmpty())
                <h1>Data from database connection two</h1>
                @foreach($test_models as $test_model)
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="name"><strong>User:</strong> {!! array_get($test_model, 'user.name') !!}</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="name"><strong>FullName:</strong> {!! $test_model->name !!}</label>
                        </div>
                    </div>
                @endforeach
            @endif
            <form action="{!! request()->url() !!}" method="get">
                <div class="col-sm-6">
                    <label for="name"><strong>Lang</strong></label>
                    <select name="local" id="local" class="form-control">
                        <option value="">--Select--</option>
                        @foreach(Config::get('laravel-gettext.supported-locales') as $key =>  $locale)
                            <option value="{!! $locale !!}" {!! request()->get('local') == $locale ? 'selected' : '' !!}>{!! $locale !!}</option>
                        @endforeach
                    </select>
                    <select name="local" id="local" class="form-control">
                        <option value="">--Select--</option>
                        <option value="th" name="th" {!! $get_lang == 'th' ? "selected" : '' !!}>Thai</option>
                        <option value="en" name="en" {!! $get_lang == 'en' ? "selected" : '' !!}>English</option>
                    </select>
                </div>
            </form>
        </div>
    </body>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
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

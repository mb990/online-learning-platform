{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    Kreiraj admina--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-sm-4 col-md-4 col-lg-4">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading text-center">--}}

{{--                    <h3 class="text-info">Novi admin</h3>--}}

{{--                </div><br>--}}

{{--                <div class="panel-body">--}}

{{--                    <form action="{{action('AdminUserController@storeAdmin')}}" method="POST" xmlns="http://www.w3.org/1999/html">--}}
{{--                        @csrf--}}
{{--                        <label for="course_name">Ime</label>--}}
{{--                        <input class="form-control" name="first_name" type="text" id="first_name" placeholder="Ime"><br>--}}

{{--                        <label for="last_name">Prezime</label>--}}
{{--                        <input class="form-control" name="last_name" id="last_name" placeholder="Prezime"></input><br>--}}

{{--                        <label for="email">Email</label>--}}
{{--                        <input class="form-control" name="email" type="email" id="email" placeholder="Email"><br>--}}

{{--                        <label for="password">Lozinka</label>--}}
{{--                        <input class="form-control" name="password" type="password" id="password" placeholder="Lozinka"><br>--}}

{{--                        <label for="password">Ponovi lozinku</label>--}}
{{--                        <input class="form-control" name="password" type="password" id="password" placeholder="Lozinka"><br>--}}

{{--                        <button class="btn btn-primary" type="submit">Potvrdi</button>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

@extends('layouts.app')
@section('title')
    Novi admin
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Novi admin') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{action('AdminUserController@storeAdmin')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ponovi lozinku') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kreiraj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.login')


@section('content')
<div class="container">
    <div class="row justify-content-center card-container">
        <div class="card">
            <div class="card-body d-flex p-2">
                <div class="col-md-8 col-lg-8 d-none d-xs-none d-sm-none d-md-block d-lg-block side-bg shadow-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pb-4">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="d-block pt-4" style="text-align:center">
                            <img src="images/ongc.png" width="50px" alt="ongc">
                            <h2 class="h-ecpec pt-2">Welfare Trusts Portal</h2>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF No.') }}</label> --}}

                            <div class="col-md-12">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required autofocus placeholder="CPF No">

                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input id="login-portal" type="hidden" name="portal" >

                        <div class="form-group row mb-0">
                            {{-- <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div> --}}

                            <div class="col-6 pr-1">
                                <button data-portal="ec" class="btn btn-primary btn-login w-100" type="button" >Login</button>    
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

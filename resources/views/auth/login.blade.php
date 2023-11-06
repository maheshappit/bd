@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <!-- <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                            <a href="{{ route('admin.login')}}" class="btn btn-danger">
                                    {{ __('Admin Login') }}
</a>
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection




@section('content')
    <form action="{{ route('user.loginWithOTP') }}" id="loginform" method="post">
        @csrf

        @if (session('status'))
            <div class="alert alert-success m-t-10">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                   placeholder="@lang('auth.email')" value="{{ old('email') }}" autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        

        <div class="row">
            <!-- <div class="col-sm-6">
                <div class="checkbox icheck">
                    <label>
                        <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input  type="checkbox" {{ old('remember') ? 'checked' : '' }}  name="remember_me" id="remember_me" class="flat-red"  style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                        @lang('auth.rememberMe')
                    </label>
                </div>
            </div> -->

            <!-- <div class="col-sm-6 text-right">
                <a href="#" id="to-recover">@lang('app.forgotPassword')</a>
            </div> -->

            <!-- /.col -->
            <div class="col-sm-12 mt-4">
                <button type="submit" id="save-form" class="btn btn-primary btn-block">@lang('auth.login')</button>
            </div>
            <!-- /.col -->
        </div>
      

    </form>

    <!-- <form class="form-horizontal" method="post" id="recoverform" style="display: none"
          action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group ">
            <div class="col-xs-12">
                <h3>@lang('app.recoverPassword')</h3>
                <p class="text-muted">@lang('app.enterEmailInstruction')</p>
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input class="form-control" type="email" id="email" name="email" required=""
                       placeholder="@lang('auth.email')" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                        type="submit">@lang('app.sendPasswordLink')</button>
            </div>
        </div>

        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="{{ route('login') }}" class="text-primary m-l-5"><b>@lang('auth.login')</b></a></p>
            </div>
        </div>
    </form> -->
@endsection
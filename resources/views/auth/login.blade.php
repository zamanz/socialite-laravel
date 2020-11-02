@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card pb-3">
                <div class="card-header">{{ __('User Login') }}</div>

                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('login.facebook')}}" target="_blank" class="btn btn-primary btn-flat btn-block"><i class="ti-facebook"></i>Sign in with facebook</a>
                        <a href="{{route('login.google')}}" class="btn btn-danger btn-flat btn-block"><i class="ti-twitter"></i>Sign in with Google</a>
                        <a href="{{route('login.github')}}" class="btn btn-success btn-flat btn-block"><i class="ti-twitter"></i>Sign in with Github</a>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
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

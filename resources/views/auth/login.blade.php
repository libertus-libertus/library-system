@extends('layouts.app')
@section('title', 'Login Page')
@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>{{ __('Login') }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your account</p>
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>

        </div>
      </form>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center d-block mt-3">Belum punya akun</a>
      </p>
    </div>
  </div>
@endsection

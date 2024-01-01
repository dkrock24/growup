@extends('layouts.login')

@section('content')
<div class="card">
    <div class="card-body">
      <!-- Logo -->
      <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2">
          <span class="app-brand-logo demo" style="text-align: center; width:100%;">
            <img src="{{ asset('storage/images/glowup.jpg') }}" width="100%"/>
          </span>
          <span class="app-brand-text demo text-body fw-bold"> {{ config('app.name', 'GrowUp') }}</span>
        </a>
      </div>
      <!-- /Logo -->
      <h4 class="mb-2">Welcome to  {{ config('app.name', 'GrowUp') }}! 👋</h4>
      <p class="mb-4">Please sign-in to your account and start the adventure</p>

      <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email or Username</label>
          
            <input 
                id="email" 
                type="email" 
                placeholder="Enter your email or username" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" value="{{ old('email') }}" 
                required autocomplete="email" 
                autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="{{ route('password.request') }} ">
              <small>Forgot Password?</small>
            </a>
          </div>
          <div class="input-group input-group-merge">

              <input 
                id="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password" 
                required 
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember-me"> Remember Me </label>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn glowup-color d-grid w-100" type="submit">Sign in</button>
        </div>
      </form>

      <p class="text-center">
        <span>New on our platform?</span>
        <a href="auth-register-basic.html">
          <span>Create an account</span>
        </a>
      </p>
    </div>
  </div>
@endsection

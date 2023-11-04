@extends('layouts.app')
<style>
.fp{
  text-decoration: none;
  color: gray;
  transition: 0.2s ease-in-out
}
.fp:hover{
  color: blue;
}
</style>
@section('content')
    <section id="login">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-5" style="padding-top:70px;">
               <img src="../assets/login.svg" alt="login" style="width:450px; height:350px;">
            </div>
            <div class="col-lg-4 offset-lg-1" style="padding-top:80px;">
               <div class="row">
                  <div class="col-12 section-intro mb-3">
                    <h1><b>Login Form</b></h1><hr>
                  </div>
               </div>
               <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="mb-4">
                    <small>{{ __('Email Address') }}</small>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ex. juandelacruz@gmail.com" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div>
                     <small>{{ __('Password') }}</small>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="my-2">
                        <input type="checkbox" name="remember" id="remember" class="mt-1" value="remember">
                        <label class="align-top" for="remember">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                      <div class="my-2">
                        <a href="{{ route('password.request') }}" class="fp">Forgot Password?</a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group mb-2 d-grid gap-2">
                    <button type="submit" class="btn btn-primary me-2 mt-2 shadow">
                        <small>{{ __('Login') }}</small>
                    </button>
                  </div>
                </form>
            </div>
         </div>
      </div>
    </section>
@endsection

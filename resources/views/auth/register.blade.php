@extends('layouts.app')
<head>
    <style>
    .loader-main{
	margin-top: -50px;
	background: radial-gradient(#CECECE, #fff);
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
.loader1 {
	width: 350px;
	height: 350px;
	border-radius: 100%;
	background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgb(220, 220, 220) 40%, rgb(170, 170, 170) 98%, rgb(10, 10, 10) 100%);
	position: relative;
}
.loader {
	
}

.loader:before {
	position: absolute;
	content: '';
	width: 100%;
	height: 100%;
	border-radius: 100%;
	border-bottom: 0 solid #ffffff05;
	
	box-shadow: 
		0 -10px 20px 20px #ffffff40 inset,
		0 -5px 15px 10px #ffffff50 inset,
		0 -2px 5px #ffffff80 inset,
		0 -3px 2px #ffffffBB inset,
		0 2px 0px #ffffff,
		0 2px 3px #ffffff,
		0 5px 5px #ffffff90,
		0 10px 15px #ffffff60,
		0 10px 20px 20px #ffffff40;
	filter: blur(3px);
	animation: 2s rotate linear infinite;
}

@keyframes rotate {
	100% {
		transform: rotate(360deg)
	}
}
    </style>
</head>
@section('content')
<div class="loader-main" id="loader-main" hidden>
<div class="loader1">
	<div class="loader"></div>
</div>  
</div>

    <section id="register">
      <div class="container">
         <div class="row align-items-center">

            <div class="col-lg-5" style="padding-top:60px;">
               <img src="../assets/register.svg" alt="login" style="width:450px; height:350px;">
            </div>
            <div class="col-lg-4 offset-lg-1" style="padding-top:30px;">
               <div class="row">
                  <div class="col-12 section-intro mb-3">
                    <h1><b>Registration Form</b></h1><hr>
                  </div>
               </div>
               <form method="POST" action="{{ route('register') }}">
               <!-- {{-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> --}} -->
                  @csrf
                  <div class="mb-3">
                     <small>{{ __('Full Name') }}</small>
                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ex. Juan Dela Cruz" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                    <small>{{ __('Email Address') }}</small>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ex. juandelacruz@gmail.com" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                     <small>{{ __('Password') }}</small>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Enter password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                     <small>{{ __('Confirm Password') }}</small>
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}" placeholder="Re-enter password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                    <!-- <div class="text text-danger mt-2 d-none" id="showRegError"></div> -->
                  <input type="hidden" id="is_admin" name="is_admin" value="0">
                  <div class="form-group mt-4 d-grid gap-2">
                    <button type="submit" class="btn btn-primary my-2 me-2 shadow" id="registerAcc">
                        <small>{{ __('Register') }}</small>
                    </button>
                  </div>
                </form>
            </div>
         </div>
      </div>
    </section>
    <script>
        $('form').submit(function() {
            $('#loader-main').show();
        });
        // $(document).ready(function() {
        //     $('#registerAcc').on('click', function(e) {
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             type: "post",
        //             url: "{{ route('register') }}",
        //             data: {
        //                 name: $('#name').val(),
        //                 email: $('#email').val(),
        //                 password: $('#password').val(),
        //                 password_confirm: $('#password_confirmation').val()
        //             },
        //             dataType: 'json',
        //             beforeSend: function() {
        //                 swal({
        //                     title: 'Please Wait!',
        //                     text: 'You are being registered, Please wait for a while...', // add html attribute if you want or remove
        //                     allowOutsideClick: false,
        //                     button: false,
        //                     onBeforeOpen: () => {
        //                         swal.showLoading()
        //                     },
        //                 });
        //             },
        //             complete: function(res) {
        //                 if (res.responseJSON.status === 500) {
        //                     $('#showRegError').addClass("d-none");
        //                     $('#showRegError').html("");
        //                     swal(
        //                         'Error',
        //                         'Something went wrong',
        //                         'error'
        //                     );
        //                 }
        //                 if (res.responseJSON.status === 200) {
        //                     $('#showRegError').addClass("d-none");
        //                     $('#showRegError').html("");
        //                     swal(
        //                         'Account Registered',
        //                         'You are registered, click ok to continue',
        //                         'success'
        //                     );
        //                 }

        //                 if (res.status === 422) {
        //                     $('#showRegError').removeClass("d-none");
        //                     $('#showRegError').html(res.responseJSON.message);
        //                 }
        //                 swal.close();
        //             },
        //         });
        //         e.preventDefault();
        //     });

        // });
    </script>
@endsection

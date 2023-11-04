@extends('layouts.client')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <div class="container">
        @if(session('scanqr'))
        <div class="alert alert-success" role="alert">
          {{session('scanqr')}}
        </div>
        @endif
    <div>
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Scan Certificate QR Code') }}
                </div>
               
                    <div class="row justify-content-center">
                        {{-- CAMERA  --}}
                            <video id="preview"></video>
                      
                    </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Result') }}
                </div>
                <input type='text' id='qrscan' readonly/>

                <div class="card-body">
                    <div class="container">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>


<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Search Certificate') }}
                </div>

                <div class="card-body">
                   
                    {{-- FIND CERTIFICATE NUMBER IN THE DATABASE TO SEE IF VALID --}}
                    <div class="container mb-4">
                        <div class="col-md-12">
                        <form action="/search" method="get">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="input-group row">
                                    <div class="mb-2"> 
                                        <label>Certificate Number</label>
                                        <input type="search" name="search" id="certificate_number" class="form-control" placeholder="Search Certificate Code">
                                        <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-primary" name="set">Search</button>
                                        </span>
                                    </div>
                                </div>
                                
                            </form>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Result') }}
                </div>

                {{-- <div class="card-body"> --}}
                    <input type='text' id='scanqr' readonly/>
                    <div class="container">
                        @if(session('scanqr'))
                        <div>
                          {{session('scanqr')}}
                        </div>
                        @endif
                        <div>
                          <br>
                        </div>
                      </div>
                

                    <div class="container">
                       
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- QR SCANNER JS --}}
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        $("#qrscan").val(content);
    //   alert(content);
    // document.getElementById('certqrcode').value=content;
    // document.forms[0].submit();
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });

    
  </script>
@endsection

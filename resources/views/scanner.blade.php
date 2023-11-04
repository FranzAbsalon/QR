@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> --}}
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" aria-current="page">Verify Certificate</li>
            </ol>
        </nav>
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        {{ __('Scan Certificate QR Code Here') }}
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row text-center">
                                {{-- CAMERA  --}}
                                {{-- <video id="preview"></video> --}}
                                <div style="width: 600px" id="reader"></div>
                                <div id="result" class="mt-2 text text-success"></div>
                            </div>

                            <form action="/certificate_validation" method="post">
                                @csrf
                                <div class="input-group row">
                                    <div class="mb-1">
                                        <input type="hidden" name="search" id="search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card px-4 pt-3" style="border: none; box-shadow: 0px 10px 10px #e0e0e0;">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-8">
                            <h2>Number of Downloads:</h2>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <h2>{{ $download_count }}</h2>
                        </div>
                    </div>  
                </div>    
                </div>
                <br>
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header bg-primary text-white">
                            {{ __('Search Code Manually') }}
                        </div>

                        <div class="card-body">
                            <div class="container mb-5">
                                <div class="col-md-12">
                                    <form action="/certificate_validation" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="form-group row">
                                            <div class="mt-3 mb-3">
                                                <label for="certificate_number">To verify you certificate, please fill in
                                                    your certificate number below:</label>
                                                <input type="text"
                                                    class="form-control mt-1 @error('search') is-invalid @enderror"
                                                    id="search" name="search" placeholder="Enter Certificate ID"
                                                    value="{{ old('search') }}">
                                                @error('search')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-5" name="submit"><i
                                                class="fa fa-check-square-o" aria-hidden="true"></i> Verify</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <script>
                swal({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            </script>
        @endif
    </div>


    {{-- QR SCANNER JS --}}
    <script type="text/javascript">
        // let scanner = new Instascan.Scanner({
        //     video: document.getElementById('preview')
        // });

        // Instascan.Camera.getCameras().then(function(cameras) {
        //     if (cameras.length > 0) {
        //         scanner.start(cameras[0]);
        //     } else {
        //         console.error('No cameras found.');
        //     }
        // }).catch(function(e) {
        //     console.error(e);
        // });

        // scanner.addListener('scan', function(content) {
        //     document.getElementById('search').value = content;
        //     document.forms[0].submit();

        // });
        var scanner = new Html5QrcodeScanner("reader", {
            qrbox: {
                width: 250,
                height: 250
            },
            fps: 20
        });

        scanner.render(success, error);

        function success(result) {
            document.getElementById('result').innerHTML = `<h2>Success</h2><p>Your QR Code is <button class="btn btn-success" id="myButton" onclick="copyText()">${result}</button></p>`;
            // scanner.clear();
            // document.getElementById('result').remove();
        }

        function copyText() {
            var button = document.getElementById("myButton");
            var text = button.innerText;

            navigator.clipboard.writeText(text).then(function() {
                swal({
                    title: "Copied to Clipboard",
                    icon: "success",
                    button: "Ok",
                    allowOutsideClick: false,
                });
            }, 
            function(err) {
                console.error('Failed to copy text: ', err);
            });
        }


        function error(err) {
            console.log(err);
            scanners.clear();
        }
    </script>
@endsection

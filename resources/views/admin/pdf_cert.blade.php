<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> 
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    <style>
        @page {
            size: 17cm 25cm landscape;
        }

        .template {
            position: absolute;
            margin-top: -10%;
            margin-left: -10%;
            z-index: -999;
        }
        .logo{
            margin-bottom: -10px;
        }
        .header, .seminar, .university, .certificate {
            margin-bottom: -20px;
        }
        .text1{
            margin-bottom: -30px;
            font-weight: normal;
        }
         .text2, .text3{
            font-weight: normal;
            margin-bottom: -10px;
        }
        .text4{
            font-weight: normal;
        }
        .name {
            font-size: 40px;
            margin-bottom: -20px;
        }

        .qrcode {
            position: absolute;
            top: 70%;
            left: 6%;
        }

        .code {
            position: absolute;
            top: 87%;
            left: 2%;
        }
        /* .signature {
            position: absolute;
            top: 80%;
            left: 80%;
        }
        .signature2{
            position: absolute;
            top: 80%;
            left: 20%;
        } */
    </style>
</head>

<body>
    <div class="container ">
        <img class="template" src="{{ $base64_cert_template }}" width="1100" height="750" />

        <?php
        // $path = asset('uploads/logo/' . $cert[0]->logo);
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <center>
        <div class="header">
           <div><img class="logo" src="{{ $base64_cert_logo }}" width="80" height="80"/></div> 
           <div><h2 class="university">{{ $cert->university }}</h2></div>
            <div><h4 class="address">{{ $cert->address }}</h4></div>
        </div>
        
        
        <h1 class="certificate">{{ $cert->certificate }}</h1>

        <h4 class="text1">This is to certify that</h4>
        <h1 class="name">{{ $users->name }}
            <hr style="width: 75%;">
        </h1>
        <h4 class="text2">completed the seminar on</h4>
        <h1 class="seminar">{{ $cert->name }}</h1>
        <h4 class="text3">conducted on</h4>
        <h3 class="text4">{{ date('F d, Y', strtotime($cert->start)) }} - {{ date('F d, Y', strtotime($cert->end)) }}</h3>
        </center>
        

        <div class="qrcode">
            <?php
            // $path = 'frame.png';
            // $type = pathinfo($path, PATHINFO_EXTENSION);
            // $data = file_get_contents($path);
            // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
            {{-- <img src="<?php echo $base64; ?>" width="100" height="100" alt="{{ $users[0]->certificate_code }}"/> --}}
            <img
                src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($users->certificate_code)) }}">
            {{-- {{ QrCode::format('png')->size(200)->generate($users[0]->certificate_code) }} --}}
            
        </div>
        <p class="code">{{ $users->certificate_code }}</p>

        <center>
         {{-- @if($cert->signature1 != null)
            <div class="row d-flex justify-content-center">
                <div class="signature">
                    <img src="{{ $base64_cert_sig1 }}" width="100" height="50" />
                </div>
            </div>
            @elseif ($cert->signature != null && $cert->signature2 != null)
            <div class="row">
                <div class="col-6 d-flex justify-content-center">
                    <img src="{{ $base64_cert_sig1 }}" width="100" height="50" />
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <img src="{{ $cert_sig2 }}" width="100" height="50" />
                </div>
            </div>
        


        @endif --}}
        <div class="row">
            <div class="col-6">
                <div class="signature">
                    <?php
                    // $path = asset('uploads/signature/' . $cert[0]->signature1);
                    // $type = pathinfo($path, PATHINFO_EXTENSION);
                    // $data = file_get_contents($path);
                    // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="{{ $base64_cert_sig1 }}" width="150" height="100" />
                </div>
            </div>
            <div class="col-6">
            {{-- @if ($cert->signature2 != null)
           
                    <div class="signature2">
                        <?php
                        // $path = asset('uploads/signature/' . $cert[0]->signature2);
                        // $type = pathinfo($path, PATHINFO_EXTENSION);
                        // $data = file_get_contents($path);
                        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                        <img src="{{ $base64_cert_sig2 }}" width="150" height="100" />
                        ?>
                    </div>
            
            @endif --}}
            </div> 
        </div>   
        </center>
        
        
    </div>
    </div>
</body>

</html>

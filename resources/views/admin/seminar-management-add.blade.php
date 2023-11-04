@extends('layouts.app')

@section('content')
<div class="container">
    <!--<nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/seminar-management" style="text-decoration: none;">Seminar and Training Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Seminar</li>
        </ol>
    </nav>-->
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Add Seminar/Training') }}
                    <i class="fa fa-circle-info" title="Image file types should be (jpeg, jpg, png.) only"></i>
                    <a href="/admin/seminar-management"><i class="fa fa-times text-white" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>

                <div class="card-body">


                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form method="post" action="{{ url('seminar') }}" enctype="multipart/form-data">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                @csrf
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Seminar/Training Name *</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Seminar Name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="mb-2"> 
                                            <label for="start">Start Date *</label>
                                            <input type="date" class="form-control mt-1 @error('start') is-invalid @enderror" id="start" name="start" value="{{ date('Y-m-d') }}">
                                                @error('start')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2"> 
                                            <label for="end">End Date *</label>
                                            <input type="date" class="form-control mt-1 @error('end') is-invalid @enderror" id="end" name="end" value="{{ old('end') }}">
                                                @error('end')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>     
                                    <div class="col-md-12">
                                        <div class="mb-2"> 
                                            <label for="university">Organization *</label>
                                                <select name="university" class="form-select" aria-label="Default select example">
                                                    <option selected disabled>Choose Organization</option>
                                                    @foreach ($orgs as $org)
                                                    <option value="{{ $org->orgname }}">{{$org->orgname}}</option>
                                                    @endforeach
                                                </select>
                                            
                                            <!-- <input type="text" class="form-control mt-1 @error('university') is-invalid @enderror" id="university" name="university" placeholder="Eg. Student Supreme Council" value="{{ old('university') }}"> -->
                                                @error('university')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>    
                                                     
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="mb-2"> 
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control mt-1 @error('address') is-invalid @enderror" id="address" name="address" placeholder="Eg. Urdaneta City,Pangasinan" value="{{ old('address') }}">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>   
                                    <div class="col-6">
                                     <div class="mb-2"> 
                                        <label for="certificate">Certificate *</label>
                                        <input type="text" class="form-control mt-1 @error('certificate') is-invalid @enderror" id="certificate" name="certificate" placeholder="Example: Certificate of Participation" value="{{ old('certificate') }}">
                                            @error('certificate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>   
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="mb-2"> 
                                            <label for="template">Template *</label>
                                            <i class="fa fa-circle-info" title="Choose on the table at the right"></i>
                                            <input type="file" class="form-control mt-1 @error('template') is-invalid @enderror" id="template" name="template" value="{{ old('template') }}">
                                                @error('template')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2"> 
                                            <label for="logo">Logo *</label>
                                            <i class="fa fa-circle-info" title="Upload your chosen logo"></i>
                                            <input type="file" class="form-control mt-1 @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{ old('logo') }}">
                                                @error('logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <label for="signature_no">Number of Signature *</label>
                                    <div class="col-md-2 mb-2">
                                        
                                        <select name="signature_no" class="form-select" id="signature_no">
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                        </select>
                                    </div>     
                                    <div class="row">
                                        <div class="col-6">
                                           <div class="mb-2"> 
                                            <label for="signature1" id="signature1">Signature 1*</label>
                                            <i class="fa fa-circle-info" title="Name, Position and Signature"></i>
                                            <input type="file" class="form-control mt-1 @error('signature1') is-invalid @enderror" id="signature" name="signature1" value="{{ old('signature1') }}">
                                                @error('signature1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2 d-none" id="signature2"> 
                                            <label for="signature2">Signature 2*</label>
                                            <i class="fa fa-circle-info" title="Name, Position and Signature"></i>
                                            <input type="file" class="form-control mt-1 @error('signature2') is-invalid @enderror" id="signature" name="signature2" value="{{ old('signature2') }}">
                                                @error('signature2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2" name="set">Add Seminar/Training</button>
                                <a href="/admin/seminar-management" class="btn btn-light mt-2" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        Landscape Templates 
                    </div>
                    <div class="card-body" style="background-color:#d3d3d3; overflow:scroll; overflow-x:hiddden; height:555px; width:300px;">
                        <a href="/assets/Certificate Template 1.jpg" download>
                            <img src="/assets/Certificate Template 1.jpg" alt="Template 1" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/Certificate Template 2.jpg" download>
                            <img src="/assets/Certificate Template 2.jpg" alt="Template 2" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/Certificate Template 3.png" download>
                            <img src="/assets/Certificate Template 3.png" alt="Template 3" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/Certificate Template 4.png" download>
                            <img src="/assets/Certificate Template 4.png" alt="Template 4" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/Certificate Template 5.png" download>
                            <img src="/assets/Certificate Template 5.png" alt="Template 5" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/Certificate Template 6.png" download>
                            <img src="/assets/Certificate Template 6.png" alt="Template 6" height="100px" width="120px" class="mx-1 my-2">
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        Portrait Templates 
                    </div>
                    <div class="card-body" style="background-color:#d3d3d3; overflow:scroll; overflow-x:hiddden; height:555px; width:300px;"">
                        <a href="/assets/CertP_1.png" download>
                            <img src="/assets/CertP_1.png" alt="Template 1" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/CertP_2.png" download>
                            <img src="/assets/CertP_2.png" alt="Template 2" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/CertP_3.png" download>
                            <img src="/assets/CertP_3.png" alt="Template 3" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/CertP_4.png" download>
                            <img src="/assets/CertP_4.png" alt="Template 4" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/CertP_5.png" download>
                            <img src="/assets/CertP_5.png" alt="Template 5" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                        <a href="/assets/CertP_6.png" download>
                            <img src="/assets/CertP_6.png" alt="Template 6" height="175px" width="120px" class="mx-1 my-2">
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
        
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#signature_no').on('change', function () {
            if($(this).val() == 2) {
                $('#signature2').removeClass('d-none');
            }
            else {
                $('#signature2').addClass('d-none');
            }
        });
    });

    let tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    let input = document.getElementById("end");
    input.min = tomorrow.toISOString().substring(0, 10);
    
</script>
@endsection
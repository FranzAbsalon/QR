@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/certificate-management" style="text-decoration: none;">Certificate Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Generate Certificate Code</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{ __('Generate Certificate Code') }}
                    <a href="/admin/certificate-management"><i class="fa fa-times text-white" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "" method = "post"  enctype="multipart/form-data">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" value="<?php echo$certificates[0]->name; ?>">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control mt-1 @error('email') is-invalid @enderror" id="email" name="email" value="<?php echo$certificates[0]->email; ?>">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <?php
                                    $randomStr = Str::random(12);
                                    $year = date("Y");
                                ?>
                                <input type="hidden" value="PSU-{{$year}}-{{$randomStr}}" id="certificate_code" name="certificate_code">
                                <input type="hidden" value="27" id="seminar_id" name="seminar_id">
                                <input type="submit" class="btn btn-success mt-4" name="set" value="Generate Certificate Code">
                                <a href="/admin/certificate-management" class="btn btn-light mt-4" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
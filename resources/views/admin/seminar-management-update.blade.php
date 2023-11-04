@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/seminar-management" style="text-decoration: none;">Seminar Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Seminar</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    {{ __('Update Seminar') }}
                    <a href="/admin/seminar-management"><i class="fa fa-times text-black" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "/seminar-management-update/<?php echo $seminars[0]->id; ?>" method = "post"  enctype="multipart/form-data">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" value="<?php echo$seminars[0]->name; ?>">
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
                                            <label for="start">Start Date</label>
                                            <input type="date" class="form-control mt-1 @error('start') is-invalid @enderror" id="start" name="start" value="<?php echo date('F d, Y', strtotime($seminars[0]->start)); ?>">
                                                @error('start')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2"> 
                                            <label for="end">End Date</label>
                                            <input type="date" class="form-control mt-1 @error('end') is-invalid @enderror" id="end" name="end" value="<?php echo date('F d, Y', strtotime($seminars[0]->end)); ?>">
                                                @error('end')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="university">University</label>
                                        <input type="text" class="form-control mt-1 @error('university') is-invalid @enderror" id="university" name="university" value="<?php echo$seminars[0]->university; ?>">
                                            @error('university')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="certificate">Certificate</label>
                                        <input type="text" class="form-control mt-1 @error('certificate') is-invalid @enderror" id="certificate" name="certificate" value="<?php echo$seminars[0]->certificate; ?>">
                                            @error('certificate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-warning mt-4" name="set" value="Update Seminar">
                                <a href="/admin/seminar-management" class="btn btn-light mt-4" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
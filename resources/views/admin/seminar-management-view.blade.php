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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{ __('View Seminar') }}
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "" method = "post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                @csrf
                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
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
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="start">Start Date</label>
                                        <input type="text" class="form-control mt-1 @error('start') is-invalid @enderror" id="start" name="start" value="<?php echo date('F d, Y', strtotime($seminars[0]->start)); ?>">
                                            @error('start')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="end">End Date</label>
                                        <input type="text" class="form-control mt-1 @error('end') is-invalid @enderror" id="end" name="end" value="<?php echo date('F d, Y', strtotime($seminars[0]->end)); ?>">
                                            @error('end')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="university">University</label>
                                        <input type="text" class="form-control mt-1 @error('university') is-invalid @enderror" id="univesity" name="university" value="<?php echo$seminars[0]->university; ?>">
                                            @error('university')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="certificate">Certificate</label>
                                        <input type="text" class="form-control mt-1 @error('certificate') is-invalid @enderror" id="certificate" name="certificate" value="<?php echo$seminars[0]->certificate; ?>">
                                            @error('certificate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <!--<button type="submit" class="btn btn-primary mt-4" name="set">Update Seminar</button><br>
                                <a href="/admin/seminar-management" class="btn btn-light mt-2" data-mdb-ripple-color="dark">Cancel</a>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="col-md-8">
            <iframe src="/assets/Certificate Template.pdf" id="pdf" frameborder="0" height="500" width="730"></iframe>
            <img src="" alt="" height="500" width="730">
        </div>-->

   
</div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
        </div>
    </div>
</div>
@endsection
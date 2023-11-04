@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/seminar-management" style="text-decoration: none;">Organization & Offices Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Organization & Office</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    {{ __('Update Organization/Office') }}
                    <a href="/admin/org-management"><i class="fa fa-times text-black" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "/org-management-update/<?php echo $org[0]->id; ?>" method = "post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Organization/Office Name</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" value="<?php echo $org[0]->orgname; ?>" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-warning mt-4" name="set" value="Update">
                                <a href="/admin/org-management" class="btn btn-light mt-4" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
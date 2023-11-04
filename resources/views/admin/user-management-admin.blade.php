@extends('layouts.app')

@section('content')
<div class="container mt">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/user-management" style="text-decoration: none;">User Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Remove Admin</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5>Remove Admin</h5>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "/user-management-user/<?php echo $users[0]->id; ?>" method = "post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" value="<?php echo$users[0]->name; ?>">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-md-12 mb-2"> 
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control mt-1 @error('email') is-invalid @enderror" id="email" name="email" value="<?php echo$users[0]->email; ?>">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <input type="hidden" id="is_admin" name="is_admin" value="0">
                                <button type="submit" class="btn btn-danger mt-4" name="set">Remove Admin</button><br>
                                <a href="/admin/user-management" class="btn btn-light mt-2" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
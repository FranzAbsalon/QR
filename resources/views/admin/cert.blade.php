@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/seminar-management" style="text-decoration: none;">Seminar and Training Management</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/cert" style="text-decoration: none;">Add Certificate Content</a></li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Add Certificates Content') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form action = "/addCert" method = "post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="content">Content</label>
                                        <input type="text" class="form-control mt-1 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Enter Content">
                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="signatures">Signatures</label>
                                        <input type="file" class="form-control mt-1 @error('signatures') is-invalid @enderror" id="signatures" name="signatures" >
                                            @error('signatures')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control mt-1 @error('logo') is-invalid @enderror" id="logo" name="logo" >
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="logo">Seminar Title</label>
                                        <select class="form-select form-control mt-1 @error('logo') is-invalid @enderror" name="temp" id="logo" aria-label="Default select example">
                                                <option selected>Select Seminar</option>
                                                @foreach ($seminar as $temp)
                                                <option value="{{ $temp -> name }}">{{ $temp -> name }}</option>
                                                @endforeach
                                        </select>
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4" name="set">Add Certificate Content</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('List of Seminar/Training') }}
                </div>

                <div class="card-body">
                    <div class="container mb-4">         
                        <div class="col-md-12">
                            <div class="card-body table-responsive">
                            @if(session()->has('delete'))
                            <div class="alert alert-danger">
                                {{ session()->get('delete') }}
                            </div>
                            @endif
                                <table class="table align-middle mb-0 bg-white" id="example">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Seminar</th>
                                            <th>Signatures</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cert as $certs)
                                            <tr>
                                                <td>{{ $certs->name }}</td>
                                                <td>{{ $certs->content}}</td>
                                                <td>{{ $certs -> temp}}</td>
                                                <td><img  src="{{ asset('image/'.$certs->signatures) }}" width="50px" height="50px"></td>
                                                <td><img  src="{{ asset('image/'.$certs->logo) }}" width="50px" height="50px">
                                                <td>
                                                    <a href="/edit-cert/{{ $certs->id }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="/deleteCert/{{ $certs->id }}" class="btn btn-danger m-1">
                                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        <a  href="/employee/pdf/ {{$certs->id}} " class="btn btn-danger"><i class="fa fa-print"></i></a>
                                                </td>
                                            </tr>      
                                        @endforeach
                                </tbody>
                            </table>

                       

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
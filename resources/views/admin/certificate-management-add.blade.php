@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/certificate-management" style="text-decoration: none;">Certificate Management</a></li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Add Participant') }}
                    <a href="/admin/certificate-management"><i class="fa fa-times text-white" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('certificate') }}" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        @csrf
                        <div class="form-group row">
                            <div class="mb-2"> 
                                <label for="name">Participant Name</label>
                                <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter participant name" value="{{ old('name') }}">
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
                                <input type="email" class="form-control mt-1 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="mb-2"> 
                                <label for="seminar_id">Select Seminar</label>
                                <select name="seminar_id" id="seminar_id" class="form-control  mt-1 @error('seminar_id') is-invalid @enderror" value="{{ old('seminar_id') }}">
                                    <option value="selected">- SELECT -</option>
                                    @foreach ($seminar as $seminar)
                                    <option value="{{ $seminar->id }}">{{ $seminar->name }}</option>
                                    @endforeach
                                </select>
                                    @error('seminar_id')
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
                        <button type="submit" class="btn btn-primary my-4" name="set">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Participant
                        </button>
                        <a href="/admin/certificate-management" class="btn btn-light my-4" data-mdb-ripple-color="dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
@endsection
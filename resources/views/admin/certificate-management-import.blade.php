@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/certificate-management-list" style="text-decoration: none;">List of Seminars</a></li>
            <li class="breadcrumb-item"><a href="/admin/certificate-management/{id}" style="text-decoration: none;">List of Participants</a></li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Import Data') }}
                <div class="card-body">
                    <form action="{{ route('certificate.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <a href="" class="btn btn-primary my-4">
                            <i class="fa fa-upload" aria-hidden="true"></i> Import Data
                        </a>
                        <a href="/admin/certificate-management/{id}" class="btn btn-light my-4" data-mdb-ripple-color="dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
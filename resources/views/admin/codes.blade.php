@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/certificate-management-list" style="text-decoration: none;">List of Seminars</a></li>
            <li class="breadcrumb-item active" aria-current="page">Certificate Management</li>
        </ol>
    </nav>
    <div class="row justify-content-start mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Import Data') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('certificate.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-primary">
                            <i class="fa fa-upload" aria-hidden="true"></i>Import Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('List of Participant') }}
                </div>
                <div class="card-body">
                    <div class="container mb-4">         
                        <div class="col-md-12">
                            <div class="card-body table-responsive">
                                <a href="/certificate-management-add" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Participant
                                </a>
                                @if(session()->has('delete'))
                                <div class="alert alert-danger">
                                    {{ session()->get('delete') }}
                                </div>
                                @endif
                                <table class="table align-middle mb-0 bg-white" id="example">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Cerificate Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $certificate)
                                            <tr>
                                                <td>{{ $certificate->name }}</td>
                                                <td>{{ $certificate->email }}</td>
                                                <td>{{ $certificate->certificate_code }}</td>
                                                <td>
                                                    <a href="" class="btn btn-success"  data-bs-toggle="tooltip" data-bs-placement="top" title="Send to Email">
                                                        <i class="fa fa-share" aria-hidden="true"></i>
                                                    </a>
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
</div>
@endsection


public function adminCertificateManagement($id) {
        $certificates = DB::select("SELECT * FROM certificate WHERE seminar_id='$id'");
        return view('/admin/certificate-management',['certificates'=>$certificates]);
    }
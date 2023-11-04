@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Certificate Management</li>
            </ol>
        </nav>
        <div class="row justify-content-start mt-4">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        {{ __('Import Data') }} 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('certificate.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            @error('file')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <button class="btn btn-primary me-2">
                                <i class="fa fa-upload" aria-hidden="true"></i> Import Data
                            </button>
                            <i class="fa fa-circle-info fa-xl" id="info" title="Upload Excel Format (.xslx or .csv)"></i>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-6 pt-1">
                                {{ __('List of Participants:') }}
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                               <h3>{{ $count }}</h3> 
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="container mb-4">
                            <div class="col-md-12">
                                <div class="card-body table-responsive">
                                    <a href="/certificate-management-add" class="btn btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add Participant
                                    </a>
                                    @if (session()->has('delete'))
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
                                                <th>Date Generated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($certificates as $certificate)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="fw-bold mb-1">{{ $certificate->name }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ $certificate->email }}"
                                                            target="_blank">{{ $certificate->email }}</a></p>
                                                    </td>
                                                    <td>
                                                        @if ($certificate->certificate_code == 0)
                                                            <a href="/certificate-management-generate/{{ $certificate->id }}"
                                                                class="btn btn-success">
                                                                Generate Code
                                                            </a>
                                                        @else
                                                            {{ $certificate->certificate_code }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($certificate->certificate_code != 0)
                                                            {{ date('F d, Y', strtotime($certificate->updated_at)) }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!--<a href="/certificate-management-update/{{ $certificate->id }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Certificate">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </a>-->
                                                        @if ($certificate->certificate_code != 0)
                                                            <a href="/employee/pdf/{{ $certificate->id }}/{{ $certificate->seminar_id }}.pdf  "
                                                                class="btn btn-success" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Print Certificate">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                        @else
                                                            <button class="btn btn-secondary" disabled>
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                        @endif
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

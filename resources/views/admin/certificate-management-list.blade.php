@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List of Seminars</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('List of Seminars') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row text-center">
                        @foreach ($seminars as $seminar)
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/certificate-management/{{ $seminar->id }}" style="text-decoration: none; color:black;">
                                        <img src="../assets/certificate.svg" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/certificate-management/{{ $seminar->id }}" style="text-decoration: none; color:black;">{{ $seminar->name }}</a></h5>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Manual</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Download User Manual</h5>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <label for="download">Click the <a href="https://drive.google.com/file/d/1eTHYL-hQ3-D6wytI5T_fEEMpykdB2lRe/view?usp=sharing" target="_blank">User Manual Link</a> or button to download the user manual.</label>
                            <a href="/assets/User Manual.pdf" download class="btn btn-primary mt-3">
                              <i class="fa fa-download" aria-hidden="true"></i> Download
                            </a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <iframe src="/assets/User-Manual2.pdf" id="pdf" frameborder="0" height="800" width="720"></iframe>
        </div>
    </div>
</div>
@endsection
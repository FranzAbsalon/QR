@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start pb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white pt-4 px-4">
                    <div class="row">
                        <div class="col-6">
                            <h4>{{ __('Welcome to Admin Dashboard') }}</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end px-4">
                        <p>
                            <?php
                                $mytime = Carbon\Carbon::now();
                                echo "Date: ".date('F d, Y', strtotime( $mytime->toDateTimeString()));
                                date_default_timezone_set("Asia/Manila");
                            ?>
                        </p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row text-center d-flex justify-content-center">
                            <div class="col-md-4 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/seminar-management" style="text-decoration: none; color:black;">
                                        <img src="../assets/training.svg" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/seminar-management" style="text-decoration: none; color:black;">Seminar & Training Management</a></h5>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/certificate-management" style="text-decoration: none; color:black;">
                                        <img src="../assets/template.svg" alt="template" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/certificate-management" style="text-decoration: none; color:black;">Certificate Management</a></h5>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/user-management" style="text-decoration: none; color:black;">
                                        <img src="../assets/users.svg" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/user-management" style="text-decoration: none; color:black;">User Management</a></h5>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/user-manual" style="text-decoration: none; color:black;">
                                        <img src="../assets/manual.svg" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/user-manual" style="text-decoration: none; color:black;">User Manual</a></h5>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/email-management" style="text-decoration: none; color:black;">
                                        <img src="../assets/emailer.png" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/email-management" style="text-decoration: none; color:black;">Email Management</a></h5>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4" id="dash">
                                <div class="icon my-3 fs-2">
                                    <a href="/admin/org-management" style="text-decoration: none; color:black;">
                                        <img src="../assets/orgMan.png" alt="training" style="width:120px; height:120px;">
                                    </a>
                                </div>
                                <h5 class="title-sm"><a href="/admin/org-management" style="text-decoration: none; color:black;">Organizations & Offices Management</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-bottom">
        <div class="container text-center text-md-start">
            <div class="row justify-content-between gy-3">
                  <div class="col-md-6">
                     <p>Copyright © <?php $year = date("Y");  echo $year; ?>. All Rights Reserved</p>
                  </div>
                  <div class="col-auto">
                     <p class="mb-0">Made with 	&#128153; by ELEVATE</p>
                  </div>
            </div>
        </div>
    </div>  
</footer> 
@endsection

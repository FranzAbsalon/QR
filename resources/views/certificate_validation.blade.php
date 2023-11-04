@extends('layouts.client')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/" style="text-decoration: none;">Go back to Website</a></li>
                <li class="breadcrumb-item"><a href="/home" style="text-decoration: none;">Verify Certificate</a></li>
            </ol>
        </nav>
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card mb-3">
                    @forelse($allrec as $item)
                        <div class="card-header bg-success text-white">
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Your Certificate is Valid.
                            <a href="/home"><i class="fa fa-times text-white" style="float:right; font-size:20px;"
                                    aria-hidden="true"></i></a>
                            <h5 class="mt-1 mx-3"><strong>{{ $item->certificate_code }}</strong></h5>
                        </div>

                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <h5 class="mt-3"><i class="fa fa-user"></i><strong> Participant Profile</strong></h5>
                                    <h6 class="mx-3 mt-2"><strong>{{ $item->name }}</strong></h6>
                                    <h6 class="mx-3">{{ $item->email }}</h6>
                                    <hr>
                                </div>
                                <!--<div class="row">
                                                                                <h5 class="mt-3"><i class="fa fa-file"></i><strong> Seminar</strong></h5>
                                                                                <h6 class="mx-3 mt-2"><strong>SKILLUP:Upscaling IT,Research, and Business Skills</strong></h6>
                                                                                <h6 class="mx-3">July 06, 2022 - July 08, 2022</h6><hr>
                                                                            </div>-->
                                <div class="row">
                                    <div class="col-12 my-1">
                                        <h6 class="mt-2">You can redownload your certificate by clicking the <b>Download</b> 
                                            button. You can also send it to your email by clicking the <b>Email Certificate</b> 
                                            button.</h6>
                                        <a href="/employee/pdf/ {{ $item->id }}/ {{ $item->seminar_id }}"
                                            class="btn btn-success m-1">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                        <a href="/employee/pdf/ {{ $item->id }}/ {{ $item->seminar_id }}"
                                            class="btn btn-primary m-1" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            <i class="fa fa-envelope"></i> Email Certificate
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Email
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST">
                                                            {{-- <input type="hidden" name="_token"
                                                                value="<?php echo csrf_token(); ?>"> --}}
                                                            <div class="mb-3">
                                                                <label for="email" class="col-form-label">Input an email
                                                                    to send the certificate:</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" placeholder="user@gmail.com" required>

                                                                <div class="text text-danger mt-2 d-none"
                                                                    id="showEmailError"></div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            id="sendEmail">Send</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @empty
            <div class="card-header bg-danger text-white">
                <i class="fa fa-times" aria-hidden="true"></i> Certificate code do not exist.
                <a href="/home"><i class="fa fa-times text-white" style="float:right; font-size:20px;"
                        aria-hidden="true"></i></a>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 class="text-center text-danger mt-5"><strong>Please enter a valid certificate code</strong>
                            </h6>
                            <a href="home" class="btn btn-danger mt-2 mb-5">Enter new certificate code</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#sendEmail').on('click', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/sendEmail",
                    data: {
                        email: $('#email').val()
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        swal({
                            title: 'Please Wait!',
                            text: 'Certificate is sending...', // add html attribute if you want or remove
                            allowOutsideClick: false,
                            button: false,
                            onBeforeOpen: () => {
                                swal.showLoading()
                            },
                        });
                    },
                    complete: function(res) {
                        if (res.responseJSON.status === 500) {
                            $('#showEmailError').addClass("d-none");
                            $('#showEmailError').html("");
                            swal(
                                'Error',
                                'Something went wrong',
                                'error'
                            );
                        }
                        if (res.responseJSON.status === 200) {
                            $('#showEmailError').addClass("d-none");
                            $('#showEmailError').html("");
                            swal(
                                'Email Sent',
                                'Check your provided Gmail Account!',
                                'success'
                            );
                        }

                        if (res.status === 422) {
                            $('#showEmailError').removeClass("d-none");
                            $('#showEmailError').html(res.responseJSON.message);
                        }
                        swal.close();
                    },
                });
                e.preventDefault();
            });

        });
    </script>
@endsection

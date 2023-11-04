@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Email Management</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mt-2">Email Message</h5>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form method="POST">
                                <!-- @csrf -->
                                {{-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> --}}
                                <label for="emails">Old Email Message</label>
                                <textarea name="email" id="email" class="col-12">{{ $message[0]->email }}</textarea>
                                <!-- <label for="email">New Email Message</label> -->
                                <!-- <input type="text" class="form-control" name="email" id="email" style="height: 50px;"> -->
                                <a href="/admin/home" class="btn btn-secondary mt-3">Back</a>
                                <input id="editEmail" type="submit" class="btn btn-primary mt-3" value="Edit Email">
                                <div class="text text-danger mt-2 d-none" id="showEmailError"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#editEmail').on('click', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/admin/email-management",
                    data: {
                        email: $('#email').val()
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        swal({
                            title: 'Success!',
                            text: 'Email message is updated!', // add html attribute if you want or remove
                            allowOutsideClick: false,
                            button: true,
                            icon: 'success',
                            onBeforeOpen: () => {
                                swal.showLoading()
                            },
                        });
                    },
                });
                e.preventDefault();
            });

        });
    </script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Seminar Management</li>
            </ol>
        </nav>
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-6 pt-1">
                            {{ __('Seminar Management: ') }}
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
                                    <a href="/admin/seminar-management-add" class="btn btn-primary mb-4">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add Seminar
                                    </a>

                                    @if (session()->has('delete'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('delete') }}
                                        </div>
                                    @endif

                                    <table class="table align-middle mb-0 bg-white" id="seminar">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Seminar Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Organization</th>
                                                <th>Address</th>
                                                <th>Certificate</th>
                                                <th>Template</th>
                                                <th>Logo</th>
                                                <th>Signature/s</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($seminars as $seminar)
                                                <tr>
                                                    <td>{{ $seminar->name }}</td>
                                                    <td>{{ date('F d, Y', strtotime($seminar->start)) }}</td>
                                                    <td>{{ date('F d, Y', strtotime($seminar->end)) }}</td>
                                                    <td>{{ $seminar->university }}</td>
                                                    <td>{{ $seminar->address }}</td>
                                                    <td>{{ $seminar->certificate }}</td>
                                                    <td>
                                                        <a href="../uploads/template/{{ $seminar->template }}">
                                                            <img src="../uploads/template/{{ $seminar->template }}"
                                                                width="70px" height="50px" alt="template">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="../uploads/logo/{{ $seminar->logo }}">
                                                            <img src="../uploads/logo/{{ $seminar->logo }}" width="70px"
                                                                height="50px" alt="logo">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="../uploads/signature/{{ $seminar->signature1 }}">
                                                            <img src="../uploads/signature/{{ $seminar->signature1 }}"
                                                                width="70px" height="50px" alt="signature">
                                                        </a>
                                                        @if ($seminar->signature2 != null)
                                                            <a href="../uploads/signature/{{ $seminar->signature2 }}">
                                                                <img src="../uploads/signature/{{ $seminar->signature2 }}"
                                                                    width="70px" height="50px" alt="signature">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('F d, Y', strtotime($seminar->created_at)) }}</td>
                                                    <td>
                                                        <!-- <a href="/seminar-management-view/{{ $seminar->id }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="View Certificate">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </a> -->
                                                        <a href="/seminar-management-update/{{ $seminar->id }}"
                                                            class="btn btn-warning" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Update Certificate">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                        <!--<a href="/deleteSeminar/{{ $seminar->id }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Seminar">
                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                </a>-->
                                                        <button type="button" class="btn btn-danger my-1" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
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

        @if ($seminars != null)
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Seminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body mt-2 mb-2">
                                <div class="text-center">
                                    <h5>
                                        <p>Are you sure you want to delete ?</p>
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" name="set"><a
                                        href="/deleteSeminar/{{ $seminar->id }}"
                                        style="text-decoration:none; color:white;">Delete Seminar</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endsection

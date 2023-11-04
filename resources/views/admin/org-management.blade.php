@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Organization & Offices Management</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row">
                            <div class="col-6 pt-1">
                            <h5 class="mt-2">List of Organization & Offices </h5>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                               <h3>{{ $count }}</h3> 
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <div class="col-md-12">
                            <a href="/admin/org-management-add" class="btn btn-primary mb-4">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Organization/Office
                            </a>

                            @if (session()->has('delete'))
                                <div class="alert alert-danger">
                                    {{ session()->get('delete') }}
                                </div>
                            @endif
                            <table class="table align-middle mb-0 bg-white" id="seminar">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Organization/Office Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($org as $orgs)
                                        <tr>
                                            <td>{{ $orgs->orgname }}</td>
                                            <td>
                                                <a href="/org-management-update/{{ $orgs->id }}"
                                                    class="btn btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Update Organization/Office">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
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
    @if ($orgs != null)
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Organization/Office</h5>
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
                                        href="/deleteOrg/{{ $orgs->id }}"
                                        style="text-decoration:none; color:white;">Delete</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
@endsection
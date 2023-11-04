@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
        </ol>
    </nav>
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row">
                            <div class="col-6 pt-1">
                            {{ __('List of Users: ') }}
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                               <h3>{{ $count-1 }}</h3> 
                            </div>
                        </div>
                </div>

                <div class="card-body">
                    <div class="container mb-4">         
                        <div class="col-md-12">
                            <div class="card-body table-responsive">
                            <table class="table align-middle mb-0 bg-white" id="example">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $users)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="fw-bold mb-1">{{ $users->name }}</p>
                                                        <p class="text-muted mb-0"><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ $users->email }}" target="_blank">{{ $users->email }}</a></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ date('F d, Y', strtotime($users->created_at)) }}</td>
                                            <td>
                                                @if($users->is_admin == 1)
                                                    <span class="badge bg-success">Administrator</span>
                                                @elseif ($users->is_admin == 0)
                                                    <span class="badge bg-warning">User</span>
                                                @endif  
                                            </td>
                                            <td>
                                                @if($users->is_admin == 1)
                                                    <button type="button" class="btn btn-success" disabled>
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </button>
                                                    <a href="/user-management-admin/{{ $users->id }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove as Admin">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a href="/user-management-user/{{ $users->id }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Add as Admin">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" disabled>
                                                        <i class="fa fa-times" aria-hidden="true"></i>
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
@endsection
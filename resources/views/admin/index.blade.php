@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Manage Admin</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="categoryList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <a href="{{ url('admin/create') }}">
                                                <button class="btn btn-primary">+ Add admin</button>
                                            </a>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search" placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1 p-3">
                                        <table class="table table-bordered border-primary" id="categoryTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="name">Admin Name</th>
                                                    <th class="sort" data-sort="email">Email</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                    <tr>
                                                        <td>{{ $admin->id }}</td>
                                                        <td>{{ $admin->name }}</td>
                                                        <td>{{ $admin->email }}</td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ url('admin/' . $admin->id . '/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="{{ url('admin/' . $admin->id . '/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <!-- Add this script at the end of your Blade file -->


@endsection
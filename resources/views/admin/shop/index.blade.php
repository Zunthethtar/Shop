@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Manage Shop</h4>
                            </div>
                            <!-- end card header -->

                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="{{ url('admin/shop/create') }}">
                                                    <button class="btn btn-primary">+ Add Shop</button>
                                                </a>
                                            </div>
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
                                        <table class="table table-bordered border-primary" id="customerTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="name">OwnerName</th>
                                                    <th class="sort" data-sort="name">Name</th>
                                                    <th class="sort" data-sort="name">Address</th>
                                                    <th class="sort" data-sort="name">Phone</th>
                                                    <th class="sort" data-sort="name">Image</th>
                                                    <th class="sort">Actions</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach ($shops as $shop)
                                                    <tr>
                                                        <td>{{ $shop->id }}</td>
                                                        <td>{{ $shop->name}}</td>
                                                        <td>{{ $shop->owner ? $shop->owner->name : "null" }}</td>
                                                        <td>{{ $shop->address }}</td>
                                                        <td>{{ $shop->phone }}</td>

                                                        <td>
                                                            @if ($shop->image)
                                                                   
                                                                <img src="{{ asset('images/' . $shop->image) }}" alt="{{ $shop->name }}" width="100">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ url('admin/shop/' . $shop->id . '/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="{{ url('admin/shop/' . $shop->id . '/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection




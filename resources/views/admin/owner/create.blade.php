@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('admin/owner/store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">+Add Owner</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div>

                        <label for="" class="form-label">Owner Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name...">
                    </div>

                    <div class="mt-2">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email...">

                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password...">

                    </div>

                    <div class="d-flex flex-row mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                        <a href="{{ url('admin/owner/index') }}" class="ms-2">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

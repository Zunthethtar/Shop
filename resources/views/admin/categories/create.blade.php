@extends('admin.layouts.master')
@section ('content')

    <div class="main-content">
        <div class="page-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <form method="POST" action="{{ url('admin/categories/store') }}">
                    @csrf
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control w-auto" placeholder="Enter Category Name...">
                    <div class="d-flex flex-row mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                        <a href="{{ url('admin/categories/index') }}" class="ms-2">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

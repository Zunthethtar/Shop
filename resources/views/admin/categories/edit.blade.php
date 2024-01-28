@extends('admin.layouts.master')
@section('content')
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
                <form method='POST' action="{{ url('admin/categories/update/' . $categories->id) }}">
                    @method('POST')
                    @csrf
                    <label class="form-label mt-3">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $categories->name }}">
                    <div class="mt-2">
                        <button class="btn btn-sm btn-success edit-item-btn" type="submit">Edit</button>
                        <a href="{{ url('admin/categories/index') }}"><button  type="button" class="btn btn-sm btn-primary">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


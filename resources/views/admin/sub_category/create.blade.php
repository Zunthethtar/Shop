@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('admin/sub_category/store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">+Add Sub Category</h4>
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
                            <div class="mb-3">
                                <label for="category_id" class="form-label">category Name</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                    <div class="mt-2">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">

                    </div>


                    <div class="d-flex flex-row mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                        <a href="{{ url('admin/sub_category/index') }}" class="ms-2">
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

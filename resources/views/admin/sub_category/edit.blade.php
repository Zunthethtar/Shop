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
                <form method='POST' action="{{ url('admin/sub_category/update/' . $sub_categories->id) }}">
                    @method('POST')
                    @csrf

                    <label class="form-label mt-3">Name</label>
                    <input type="" class="form-control" name="name" value="{{ $sub_categories->name }}">
                    <label class="form-label mt-3"> Category Name</label>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $sub_categories->category_id}}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    
                    <div class="mt-2">
                        <button class="btn btn-sm btn-success edit-item-btn" type="submit">Edit</button>
                        <a href="{{ url('admin/sub_category/index') }}">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



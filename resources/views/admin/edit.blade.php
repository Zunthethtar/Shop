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
                <form method='POST' action="{{ url('admin/update/' . $admins->id) }}">
                    @method('POST')
                    @csrf
                    <label class="form-label mt-3">Admin Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $admins->name }}">
                    <label class="form-label mt-3">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $admins->email }}">
                    <label class="form-label mt-3">Password</label>
                    <input type="text" class="form-control" name="password">
                    <div class="mt-2">
                        <button class="btn btn-sm btn-success edit-item-btn" type="submit">Edit</button>
                        <a href="{{ url('admin/index') }}"><button  type="button" class="btn btn-sm btn-primary">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


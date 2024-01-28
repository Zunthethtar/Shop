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
                <form method='POST' action="{{ url('admin/owner/update/' . $owner->id) }}">
                    @method('POST')
                    @csrf
                    <label class="form-label mt-3">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $owner->name }}">

                    <label class="form-label mt-3">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $owner->email }}">

                    <label class="form-label mt-3">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter new password...">

                    <div class="mt-2">
                        <button class="btn btn-sm btn-success edit-item-btn" type="submit">Edit</button>
                        <a href="{{ url('admin/owner/index') }}">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



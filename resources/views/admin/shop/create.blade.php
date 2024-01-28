@extends('admin.layouts.master')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form method="POST" action="{{ url('admin/shop/store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Add Shop</h4>
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
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Shop name...">
                            </div>
                            <div class="mb-3">
                                <label for="owner_id" class="form-label">Owner Name</label>
                                <select name="owner_id" class="form-control" required>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Your Address...">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number...">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" >
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ url('admin/shop/index') }}" class="ms-2">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


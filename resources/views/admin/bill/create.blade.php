@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('admin/bill/store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">+Add Bill</h4>
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
                                <label for="owner_id" class="form-label">Owner Name</label>
                                <select name="owner_id" class="form-control" required>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                    <div class="mt-2">
                        <label for="" class="form-label">Date</label>
                        <input type="text" name="date" class="form-control">

                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Amount</label>
                        <input type="" name="amount" class="form-control" placeholder="...">

                    </div>

                    <div class="d-flex flex-row mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                        <a href="{{ url('admin/bill/index') }}" class="ms-2">
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

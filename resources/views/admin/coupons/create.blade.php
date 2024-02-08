@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('coupons.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">+ Add Coupon</h4>
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
                                <label for="code" class="form-label">Coupon Code</label>
                                <input type="text" name="code" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                <input type="text" name="discount_percentage" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="valid_from" class="form-label">Valid From</label>
                                <input type="datetime-local" name="valid_from" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="valid_to" class="form-label">Valid To</label>
                                <input type="datetime-local" name="valid_to" class="form-control" required>
                            </div>

                            <div class="d-flex flex-row mt-2">
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                                <a href="{{ route('coupons.index') }}" class="ms-2">
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

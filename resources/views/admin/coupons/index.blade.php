@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Manage Coupons</h4>
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="{{ route('coupons.create') }}" class="btn btn-primary">Create Coupon</a>
                                </div>

                                <!-- Your existing code for displaying coupons goes here -->

                                <div class="table-responsive table-card mt-3 mb-1 p-3">
                                    <table class="table table-bordered border-primary" id="couponTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Coupon Code</th>
                                                <th scope="col">Discount Percentage</th>
                                                <th scope="col">Valid From</th>
                                                <th scope="col">Valid To</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->id }}</td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->discount_percentage }}</td>
                                                <td>{{ \Carbon\Carbon::parse($coupon->valid_from)->format('Y-m-d H:i:s') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($coupon->valid_to)->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ url('admin/coupons/' . $coupon->id . '/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                                        <a href="{{ url('admin/coupons/' . $coupon->id . '/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

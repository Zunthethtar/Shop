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
                <form method='POST' action="{{ url('admin/bill/update/' . $bills->id) }}">
                    @method('POST')
                    @csrf
                    <label class="form-label mt-3">Owner Name</label>
                    <select name="owner_id" class="form-select">
                        @foreach ($owners as $owner)

                            <option value="{{ $owner->id }}" {{ $bills->owner_id }}>
                                {{ $owner->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="form-label mt-3">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ $bills->date }}">

                    <label class="form-label mt-3">Amount</label>
                    <input type="" class="form-control" name="amount" placeholder="..." value="{{ $bills->amount }}">

                    <div class="mt-2">
                        <button class="btn btn-sm btn-success edit-item-btn" type="submit">Edit</button>
                        <a href="{{ url('admin/bill/index') }}">
                            <button type="button" class="btn btn-sm btn-primary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



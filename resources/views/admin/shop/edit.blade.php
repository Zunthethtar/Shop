@extends ('admin.layouts.master')
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
                <form method='POST'enctype="multipart/form-data" action="{{ url('admin/shop/update/' . $shops->id) }}">
                    @csrf
                    @method('POST')

                    <label class="form-label mt-3">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $shops->name }}">
                    <label class="form-label mt-3">Owner Name</label>
                    <select name="owner_id" class="form-select">
                        @foreach ($owners as $owner)

                            <option value="{{ $owner->id }}" {{ $shops->owner_id }}>
                                {{ $owner->name }}
                            </option>
                        @endforeach
                    </select>

                    <label class="form-label mt-3">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $shops->address }}">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($shops->image)
                    <img src="{{ asset('images/' . $shops->image) }}" alt="{{ $shops->name }}" class="mt-2" width="100" style="height: auto;">
                    
                    <input type="text" class="form-control" value="{{ asset('images/' . $shops->image) }}" readonly>
                    @endif
                    <label class="form-label mt-3">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{ $shops->phone }}">
                    <div class="mt-2">

                        <button class="btn btn-sm btn-success edit-item-btn"type="submit"> Edit</button>
                        <a href="{{ url('admin/shop/index') }}"><button
                            class="btn btn-sm btn-primary" type="button">Cancel</button></a>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection

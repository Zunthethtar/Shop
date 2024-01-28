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
                <form method='POST'enctype="multipart/form-data" action="{{ url('admin/products/update/' . $product->id) }}">
                    @csrf
                    @method('POST')
                    <label class="form-label mt-3">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    <label class="form-label mt-3">Sub Category</label>
                    <select name="sub_category_id" class="form-select">
                        @foreach ($sub_categories as $sub_category)

                            <option value="{{ $sub_category->id }}" {{ $product->sub_category }}>
                                {{ $sub_category->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="form-label mt-3"> Shop</label>
                    <select name="shop_id" class="form-select">
                        @foreach ($shops as $shop)

                            <option value="{{ $shop->id }}" {{ $product->shop }}>
                                {{ $shop->name }}
                            </option>
                        @endforeach
                    </select>

                    <label class="form-label mt-3">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="mt-2" width="100" style="height: auto;">
                    
                    <input type="text" class="form-control" value="{{ asset('images/' . $product->image) }}" readonly>
                    @endif
                    <label class="form-label mt-3">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    <div class="mt-2">

                        <button class="btn btn-sm btn-success edit-item-btn"type="submit"> Edit</button>
                        <a href="{{ url('admin/products/index') }}"><button
                            class="btn btn-sm btn-primary" type="button">Cancel</button></a>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection

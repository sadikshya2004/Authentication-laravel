@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

<div class="container page-content">

    <div class="page-header">
        <div>
            <h1>Add New Product</h1>
            <p>Create a new product</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn-secondary">
            Back
        </a>
    </div>

    <div class="form-card">

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Product Name -->

            <div class="form-group">

                <label>Product Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>

            <!-- SKU -->

            <div class="form-group">

                <label>SKU</label>

                <input
                    type="text"
                    name="sku"
                    value="{{ old('sku') }}"
                >

                @error('sku')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>

            <!-- Category -->

            <div class="form-group">

                <label>Category</label>

                <select name="category_id">

                    <option value="">Select Category</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id')==$category->id ? 'selected':'' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>

            <!-- Price -->

            <div class="form-group">

                <label>Price ($)</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    value="{{ old('price') }}"
                >

                @error('price')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>

            <!-- Quantity -->

            <div class="form-group">

                <label>Quantity</label>

                <input
                    type="number"
                    name="quantity"
                    value="{{ old('quantity') }}"
                >

                @error('quantity')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>

            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="1">Active</option>

                    <option value="0">Inactive</option>

                </select>

            </div>

            <!-- Description -->

            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="5"
                >{{ old('description') }}</textarea>

            </div>

            <!-- Image -->

            <div class="form-group">

                <label>Product Image</label>

                <input
                    type="file"
                    name="image"
                    id="imageInput"
                    accept="image/*"
                >

                @error('image')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <img
                    id="previewImage"
                    class="preview-image"
                    style="display:none;"
                >

            </div>

            <button class="btn-primary">

                Save Product

            </button>

        </form>

    </div>

</div>

@endsection
@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container page-content">

    <div class="page-header">
        <div>
            <h1>Product Management</h1>
            <p>Manage all products</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn-primary">
            + Add Product
        </a>
    </div>


    {{-- Flash Messages --}}

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif


    {{-- Search & Filter --}}

    <form action="{{ route('products.index') }}" method="GET" class="filter-form">

        <input
            type="text"
            name="search"
            placeholder="Search product..."
            value="{{ request('search') }}"
        >

        <select name="category">

            <option value="">All Categories</option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ request('category') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        <select name="status">

            <option value="">All Status</option>

            <option
                value="1"
                {{ request('status') == '1' ? 'selected' : '' }}
            >
                Active
            </option>

            <option
                value="0"
                {{ request('status') == '0' ? 'selected' : '' }}
            >
                Inactive
            </option>

        </select>


        <select name="sort">

            <option value="">Sort By</option>

            <option
                value="name"
                {{ request('sort')=='name' ? 'selected':'' }}
            >
                Name
            </option>

            <option
                value="price"
                {{ request('sort')=='price' ? 'selected':'' }}
            >
                Price
            </option>

            <option
                value="quantity"
                {{ request('sort')=='quantity' ? 'selected':'' }}
            >
                Stock
            </option>

        </select>

        <button class="btn-primary">

            Search

        </button>

    </form>

    <div class="table-container">

        <table>

            <thead>

            <tr>

                <th>Image</th>

                <th>Name</th>

                <th>SKU</th>

                <th>Category</th>

                <th>Price</th>

                <th>Stock</th>

                <th>Status</th>

                <th>Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($products as $product)

                <tr>

                    <td>

                        @if($product->image)

                            <img
                                src="{{ asset('storage/'.$product->image) }}"
                                class="table-image"
                            >

                        @else

                            <img
                                src="https://via.placeholder.com/60"
                                class="table-image"
                            >

                        @endif

                    </td>

                    <td>

                        {{ $product->name }}

                    </td>

                    <td>

                        {{ $product->sku }}

                    </td>

                    <td>

                        {{ $product->category->name }}

                    </td>

                    <td>

                        ${{ number_format($product->price,2) }}

                    </td>

                    <td>

                        {{ $product->quantity }}

                    </td>

                    <td>

                        @if($product->status)

                            <span class="badge success">

                                Active

                            </span>

                        @else

                            <span class="badge danger">

                                Inactive

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="action-buttons">

                            <a
                                href="{{ route('products.show',$product) }}"
                                class="btn-view"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('products.edit',$product) }}"
                                class="btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('products.destroy',$product) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this product?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button class="btn-delete">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8">

                        No products found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="pagination-wrapper">

        {{ $products->withQueryString()->links() }}

    </div>

</div>

@endsection
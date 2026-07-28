<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display Products
     */
    public function index(Request $request)
    {

    }

    /**
     * Create Form
     */
    public function create()
    {

    }

    /**
     * Store Product
     */
    public function store(StoreProductRequest $request)
    {

    }

    /**
     * Show Product
     */
    public function show(Product $product)
    {

    }

    /**
     * Edit Product
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update Product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

    }

    /**
     * Delete Product
     */
    public function destroy(Product $product)
    {

    }
}
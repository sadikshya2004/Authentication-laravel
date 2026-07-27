<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display Category List
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {

            $query->where('name', 'LIKE', "%{$search}%");

        })
        ->latest()
        ->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store Category
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show Category
     */
    public function show(Category $category)
    {
        return redirect()->route('categories.index');
    }

    /**
     * Edit Form
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update Category
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete Category
     */
    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {

            return back()->with(
                'error',
                'Cannot delete category because it contains products.'
            );

        }

        $category->delete();

        return back()->with(
            'success',
            'Category deleted successfully.'
        );
    }
}
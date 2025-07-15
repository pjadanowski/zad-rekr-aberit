<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Cache::remember('categories.index', 60, function () {
            return Category::withCount('products')->get();
        });

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        Cache::forget('categories.index');
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->loadCount('products');

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        Cache::forget('categories.index');
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Cache::forget('categories.index');
        return response()->json(['message' => 'Category deleted']);
    }
}

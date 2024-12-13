<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::paginate(5);
        // return view("admin.categories.index", compact("categories"));

        $categories = Category::withDepth()->get()->toTree();
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::withDepth()->get()->toTree();
        return view("admin.categories.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::withDepth()->find($id);
        $subtree = Category::withDepth()->descendantsOf($category)
            // Add depth information to each category
            ->map(function ($descendant) use ($category) {
                // Calculate the depth relative to the root category
                $descendant->depth = $descendant->depth - $category->depth - 1;
                return $descendant;
            });
        $subtree = $subtree->toTree();
        return view('admin.categories.show', [
            'category' => $category,
            'subtree' => $subtree
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view("admin.categories.edit", compact("category", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

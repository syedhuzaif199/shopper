<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        // add temporary access link to the image
        $products->map(function ($product) {
            if (Storage::disk('s3')->exists($product->image)) {
                $product->image = Storage::disk('s3')->temporaryUrl($product->image, now()->addMinutes(5));
            }
            return $product;
        });
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::withDepth()->get()->toTree();
        return view("admin.products.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'gst_perc' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount_perc' => ['required', 'numeric', 'min:0', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->category_id) {
            $request->validate([
                'category_id' => ['exists:categories,id'],
            ]);
        }

        $imageName = time() . '.' . $request->image->extension();
        // store uploaded image to s3
        $path = $request->image->storeAs('products', $imageName, 's3');
        $imgPath = 'products/' . $imageName;


        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'gst_perc' => $request->gst_perc,
            'discount_perc' => $request->discount_perc,
            'category_id' => $request->category_id,
            'image' => $imgPath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::withDepth()->get()->toTree();
        return view("admin.products.edit", compact("product", 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'gst_perc' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount_perc' => ['required', 'numeric', 'min:0', 'max:100'],
            // 'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->category_id) {
            $request->validate([
                'category_id' => ['exists:categories,id'],
            ]);
        }
        $request->validate([
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $attributes['category_id'] = $request->category_id;

        $product->update($attributes);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imageName = time() . '.' . $request->image->extension();
            $imgPath = '/storage/' . $request->image->storeAs('products', $imageName, 'public');
            $product->update(['image' => $imgPath]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}

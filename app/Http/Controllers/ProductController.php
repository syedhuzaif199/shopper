<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }
}

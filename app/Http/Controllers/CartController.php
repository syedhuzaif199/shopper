<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    public function index()
    {
        // if the user is not authenticated, return the items in the session cart
        if (! Auth::check()) {
            $sessionCart = session()->get('cart', []);
            $cart = new Collection();

            foreach ($sessionCart as $product_id => $quantity) {
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->quantity = $quantity;
                $cartItem->product = Product::find($product_id); // Load the product
                $cart->push($cartItem);
            }

            return view('cart.index', ['cart' => $cart]);
        }

        // if the user is authenticated, return the items in the database cart + the items in the session cart
        $cart = Auth::user()->carts->mapWithKeys(function ($item) {
            return [$item['product_id'] => $item['quantity']];
        })->toArray();
        $sessionCart = session()->get('cart', []);

        $mergedCart = [];
        foreach ($cart as $product_id => $quantity) {
            if (array_key_exists($product_id, $sessionCart)) {
                $mergedCart[$product_id] = $quantity + $sessionCart[$product_id];
            } else {
                $mergedCart[$product_id] = $quantity;
            }
        }
        foreach ($sessionCart as $product_id => $quantity) {
            if (! array_key_exists($product_id, $cart)) {
                $mergedCart[$product_id] = $quantity;
            }
        }

        Cart::where('user_id', Auth::id())->delete();
        foreach ($mergedCart as $product_id => $quantity) {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }

        $cart = Auth::user()->carts()->with('product')->get();
        session()->put('cart', []);

        return view('cart.index', ['cart' => $cart]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // if the user is not authenticated, store the items in the session cart
        if (! Auth::check()) {
            $sessionCart = session()->get('cart', []);
            $sessionCart[$request->product_id] = $request->quantity;
            session()->put('cart', $sessionCart);

            $cart = new Collection();
            foreach ($sessionCart as $product_id => $quantity) {
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->quantity = $quantity;
                $cartItem->product = Product::find($product_id); // Load the product
                $cart->push($cartItem);
            }

            return view('cart.index', ['cart' => $cart]);
        }

        // if the user is authenticated, store the items in the database cart
        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id
            ],
            [
                'quantity' => $request->quantity
            ]
        );
        // cast Auth::user() to a User model to use the carts relationship


        $cart = Auth::user()->carts()->with('product')->get();
        return view('cart.index', ['cart' => $cart]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (! Auth::check()) {
            $sessionCart = session()->get('cart', []);
            $sessionCart[$product->id] = $request->quantity;
            session()->put('cart', $sessionCart);
        } else {
            Cart::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_id' => $product->id
                ],
                [
                    'quantity' => $request->quantity
                ]
            );
        }

        return back();
    }

    public function destroy(Product $product)
    {
        if (! Auth::check()) {
            $sessionCart = session()->get('cart', []);
            unset($sessionCart[$product->id]);
            session()->put('cart', $sessionCart);
        } else {
            Cart::where('user_id', Auth::id())->where('product_id', $product->id)->delete();
        }

        return back();
    }
}

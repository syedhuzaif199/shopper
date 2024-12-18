<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'integer'],
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'type' => ['required', 'in:home,office,other'],
        ]);

        if ($request->is_default) {
            $attributes['is_default'] = true;
        } else {
            $attributes['is_default'] = false;
        }

        Auth::user()->customerAddresses()->create($attributes);

        return back();
    }
}

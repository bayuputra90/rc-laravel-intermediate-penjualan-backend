<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutResource;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required',
            'product_id' =>'required|exists:products,id',
            'address' =>'required',
            'amount' =>'required',
        ]);

        $checkout = new Checkout();
        $checkout->product_id = $validated['product_id'];
        $checkout->name = $validated['name'];
        $checkout->address = $validated['address'];
        $checkout->amount = $validated['amount'];
        $checkout->save();

        $response = [
            'message' => 'Checkout success, please make payment',
            'data' => CheckoutResource::make($checkout),
        ];

        return response()->json($response, 201);
    }
}

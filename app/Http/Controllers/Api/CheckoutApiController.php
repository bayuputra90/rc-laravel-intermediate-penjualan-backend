<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutResource;
use App\Mail\CheckoutMail;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required',
            'product_id' =>'required|exists:products,id',
            'address' =>'required',
            'email' =>'required|email:dns',
            'phone' =>'required',
            'amount' =>'required',
        ]);

        $checkout = new Checkout();
        $checkout->product_id = $validated['product_id'];
        $checkout->name = $validated['name'];
        $checkout->address = $validated['address'];
        $checkout->email = $validated['email'];
        $checkout->phone = $validated['phone'];
        $checkout->amount = $validated['amount'];
        $checkout->product->qty -= $validated['amount'];
        $checkout->product->save();
        $checkout->save();

        Mail::to($validated['email'])->send(new CheckoutMail($checkout));

        $response = [
            'message' => 'Checkout success, please make payment',
            'data' => CheckoutResource::make($checkout),
        ];

        return response()->json($response, 201);
    }

    public function show(Checkout $checkout)
    {
        $response = [
            'message' => 'Data retrieved',
            'data' => CheckoutResource::make($checkout),
        ];

        return response()->json($response, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::all();

        return view('dashboard.data.sales.index', [
            'checkouts' => $checkouts,
        ]);
    }

    public function show(Checkout $checkout)
    {
        return view('dashboard.data.sales.show', [
            'checkout' => $checkout,
        ]);
    }

    public function update(Request $request, Checkout $checkout)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:Waiting for payment,Process,Sent,Done'],
        ]);

        $checkout->status = $validated['status'];
        $checkout->save();

        return redirect()->route('sales.index')->with('message', "Checkout's Status has been update");
    }
}

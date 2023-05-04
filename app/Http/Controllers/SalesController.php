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
}

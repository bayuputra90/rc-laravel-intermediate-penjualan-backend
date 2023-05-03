<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];

        return view('dashboard.data.product.index', $data);
    }

    public function create()
    {
        return view('dashboard.data.product.create');
    }

    public function store(Request $request)
    {
        // setting rules
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required|file|image',
            'description' => 'required',
            'status' => 'required',
        ];

        // Validation
        $validated = $request->validate($rules);

        // Upload File Image
        $image = $request->file('image')->store('images/products', 'public');

        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->qty = $validated['qty'];
        $product->image = $image;
        $product->description = $validated['description'];
        $product->status = $validated['status'];
        $product->save();

        return redirect(url('product'))->with('message', 'Product has been added');
    }

    public function show(String $id)
    {
        $product = Product::find($id);

        $data = [
            'product' => $product,
        ];

        return view('dashboard.data.product.show', $data);
    }

    public function edit(string $id)
    {
        $product = Product::find($id);

        $data = [
            'product' => $product,
        ];

        return view('dashboard.data.product.edit', $data);
    }
}

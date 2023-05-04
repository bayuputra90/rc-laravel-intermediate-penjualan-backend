<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductListResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::whereStatus('active')->paginate(10);

        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => ProductListResource::collection($products),
            'pagination' => [
                "current_page" => $products->currentPage(),
                "first_page_url" =>  $products->getOptions()['path'].'?'.$products->getOptions()['pageName'].'=1',
                "prev_page_url" =>  $products->previousPageUrl(),
                "next_page_url" =>  $products->nextPageUrl(),
                "last_page_url" =>  $products->getOptions()['path'].'?'.$products->getOptions()['pageName'].'='.$products->lastPage(),
                "last_page" =>  $products->lastPage(),
                "per_page" =>  $products->perPage(),
                "total" =>  $products->total(),
                "path" =>  $products->getOptions()['path'],
            ],
        ]);
    }
}

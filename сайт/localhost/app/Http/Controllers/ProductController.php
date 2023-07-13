<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function product(){
        $data = [];
        $product = Product::get();
        $data['product'] = $product;
        return view('index', $data);
    }

}

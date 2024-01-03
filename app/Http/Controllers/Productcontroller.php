<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Productcontroller extends Controller
{
    public function product(){
        $Product = Product::orderBy('id' , 'DESC')->get();
        return response()->json([
            'products' => $Product
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductRepository;

class PageIndexController extends Controller
{
    public function index(ProductRepository $allProducts){

        $products = $allProducts->allProducts();
        //dd($products);
        // foreach ($products as $value) {
        //     var_dump($value->name);
        // }
        //die;
        return view('index', compact('products'));
    }
}

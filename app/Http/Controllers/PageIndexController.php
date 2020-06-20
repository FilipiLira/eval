<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductRepository;

class PageIndexController extends Controller
{
    public function index(ProductRepository $allProductsEvals){

        $productsAndEvaluationsMed = $allProductsEvals->allProductsEvals();
        //dd($products);
        // foreach ($products as $value) {
        //     var_dump($value->name);
        // }
        $products = $productsAndEvaluationsMed["products"];
        $evalMeds = $productsAndEvaluationsMed["evalMeds"];
        // dd($evalMeds);
        // die;
        return view('index', compact('products', 'evalMeds'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ProductRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ProductRepository $productR)
    {
        $userLogged = Auth::user()->id;

        // $allProductsUser = \App\Product::where('user_id', $userLogged)->paginate(3);

        $allProductsUser = $productR->allUserProducts($userLogged);

        // dd($allProductsUser);
        // die;
        
        return view('home', compact('allProductsUser'));
    }
}

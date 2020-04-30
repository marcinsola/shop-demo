<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;

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
    public function index()
    {
        $products = Product::all();
        $userId = \Auth::id();
        $cart = Cart::where('is_closed', 0)
            ->orderBy('created_at', 'desc')
            ->firstOrCreate(['user_id' => $userId]);

        return view('home', compact(['products', 'cart']));
    }
}

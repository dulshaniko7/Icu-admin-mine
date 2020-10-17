<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('client.index', compact('products'));
    }
}

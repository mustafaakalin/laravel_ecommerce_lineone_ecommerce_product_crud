<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->limit(4)->get();
        return view('index', compact('products'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }




    public function products()
    {
        $products = Products::orderBy('id', 'desc')->paginate(12);
        return view('products', compact('products'));
    }


    public function productDetails(string $slug)
    {
        $products = Products::orderBy('id', 'desc')->limit(4)->get();
        $product = Products::where('slug', $slug)->first();
        return view('product', [
            'product' => $product,
            'products' => $products

        ]);
    }
}

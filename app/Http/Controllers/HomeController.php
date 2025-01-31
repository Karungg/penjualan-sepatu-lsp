<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(10);

        return view('home', [
            'products' => $products
        ]);
    }

    public function show(string $id): View
    {
        $product = Product::find($id);

        return view('show', [
            'product' => $product
        ]);
    }
}

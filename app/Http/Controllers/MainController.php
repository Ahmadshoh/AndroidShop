<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index() {
        $products = Product::paginate(9);
        $sliders = Slider::all();

        return view('index', compact('products', 'sliders'));
    }
}

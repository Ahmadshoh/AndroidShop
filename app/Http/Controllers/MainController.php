<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::paginate(9);
        $sliders = Slider::all();

        return view('index', compact('products', 'sliders'));
    }

    public function category($category_alias, $child_alias=null) {
        if ($child_alias != null) {
            $child_category = Category::where('alias', $child_alias)->first();
            $parent_category = Category::where('alias', $category_alias)->first();
            $products = Product::where('category_id', $child_category->id)->get();

            return view('category', [
                'products'          => $products,
                'parent_category'   => $parent_category,
                'child_category'    => $child_category
            ]);
        } else {
            $category = Category::where('alias', $category_alias)->first();
            $category_children = Category::where('parent_id', $category->id)->get();
            return view('category', [
                'category_children'   => $category_children,
                'parent_category'   => $category
            ]);
        }
    }

    public function product($parent_category_alias, $child_category_alias=null, $product_alias) {
        $product = Product::where('alias', $product_alias)->first();

        return view('product', [
            'parent_category_alias'     => $parent_category_alias,
            'child_category_alias'      => $child_category_alias ?? '',
            'product'                   => $product
        ]);
    }
}

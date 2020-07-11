<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'products'  => Product::paginate(20)
        ]);
    }


    public function create()
    {
        return view('admin.product.create', [
            'product'   => [],
            'categories'=> Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        $path = $request->file('image')->store('phones', 'public');
        $visible = 1 ? isset($request->visible) : 0;
        $recommended = 1 ? isset($request->recommended) : 0;

        $params = $request->all();

        $params['image'] = $path;
        $params['visible'] = $visible;
        $params['recommended'] = $recommended;

        Product::create($params);

        return redirect()->route('admin.product.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product'   => $product,
            'categories'=> Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->title = $request['title'];
        $product->alias = $request['alias'];
        $product->alif_link = $request['alif_link'];
        $product->price = $request['price'];
        $product->amount = $request['amount'];
        $product->description = $request['description'];
        $product->visible = 1 ? isset($request->visible) : 0;;
        $product->recommended = 1 ? isset($request->recommended) : 0;

        if(!empty($request->file('image'))) {
            $path = $request->file('image')->store('phones', 'public');

            $product->image = $path;
        }

        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws Exception
     */

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}

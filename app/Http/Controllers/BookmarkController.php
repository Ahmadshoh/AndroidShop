<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class BookmarkController extends Controller
{
    public function index() {
        if (!Session::has('bookmark')) {
            return view('bookmark', ['products' => null]);
        }

        return view('bookmark', ['products' => Session::get('bookmark')]);
    }

    public function add(Request $request, $id) {
        $items = [];
        $product = Product::find($id);
        $oldBookmark = Session::has('bookmark') ? Session::get('bookmark') : null;

        if ($oldBookmark) {
            $items = $oldBookmark;
        }

        if ($items && array_key_exists($id, $items)) {
            return redirect()->route('index')->withErrors('Товар уже существует!');
        }

        $items[$id] = $product;
        $request->session()->put('bookmark', $items);
//        dd($request->session()->get('bookmark'));
        return redirect()->route('index')->with('success', "Товар успешно добавлен в закладки!");
    }

    public function delete(Request $request, $id) {
        $request->session()->forget('bookmark');
        return redirect()->route('bookmark');
    }

    public function clear(Request $request) {
        $request->session()->forget('bookmark');
        return redirect()->route('index');
    }

}

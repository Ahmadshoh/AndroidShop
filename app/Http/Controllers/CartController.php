<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function index() {
        if (!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function add(Request $request, $id) {
        if (isset($_GET['qty'])) {
            $qty = $_GET['qty'];
        }else {
            $qty = 1;
        }
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $qty);

        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart'));

        return redirect()->route('index');
    }

    public function delete(Request $request, $id) {

    }

    public function deleteAll(Request $request) {
        $request->session()->forget('cart');
        return redirect()->route('cart');
    }

    public function sendToOrder(Request $request) {
        $order_id = Order::create($request->all())->id;
//        $this->orderProduct($order_id);
        $request->session()->forget('cart');
        return redirect()->route('cart');
    }

    protected function orderProduct($order_id) {

    }
}

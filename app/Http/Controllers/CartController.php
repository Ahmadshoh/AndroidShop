<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
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

    public function getData() {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return [
            'products'      => json_encode($cart->items),
            'totalPrice'    => $cart->totalPrice,
            'totalQty'      => $cart->totalQty
        ];
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

        return redirect()->route('index')->with('success', "Товар успешно добавлен в корзину!");
    }

    public function delete($id) {
        $cart = session()->get('cart', []);

        if(isset($cart->items[$id])) {
            $cart->totalQty -= $cart->items[$id]['qty'];
            $cart->totalPrice -= $cart->items[$id]['price'];

            unset($cart->items[$id]);
        }

        if ($cart->totalQty > 0)
            session()->put('cart', $cart);
        else
            session()->forget('cart');

        return redirect()->route('cart')->with('success', 'Товар успешно удалён из корзины!');
    }

    public function clear(Request $request) {
        $request->session()->forget('cart');
        return redirect()->route('index');
    }


    public function sendToOrder(Request $request) {
        if (!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $params = $request->all();

        $params['qty'] = $cart->totalQty;
        $params['totalPrice'] = $cart->totalPrice;

//        dd($request->all());
//
//        dd($params);

        $order_id = Order::create($params)->id;

        foreach ($cart->items as $product) {
            $order_product = new OrderProduct;

            $order_product->order_id = $order_id;
            $order_product->product_id = $product['item']->id;
            $order_product->qty = $product['qty'];
            $order_product->total_price = $product['price'];

            $order_product->save();
        }

        session()->forget('cart');

        return redirect()->route('cart');
    }
}

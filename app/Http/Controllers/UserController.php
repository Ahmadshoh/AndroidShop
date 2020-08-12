<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showOrders() {
        $orders = Order::where("user_id", Auth::id())->get();
        return view("auth.orders", compact('orders'));
    }

    public function showOrderInfo(Order $order) {
//        dd($order->orderProduct->first()->getProduct($order->orderProduct->first()->id));
//        dd($order);
        return view('auth.order-info', [
            'orderItems'  => $order->getItems()
        ]);
    }

    public function userProfile() {
        $user = User::find(Auth::id());

        return view('auth.profile', compact('user'));
    }

    public function updateUserData(Request $request, User $user) {
        $validate = $request->validate ( [
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'max:13'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $request['password'] == null ?: $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->route('user.profile')->with('success', "Данные успешно изменеы!");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index', [
            'productsCount'  => Product::all()->count(),
            'usersCount'     => User::all()->count()
        ]);
    }
}

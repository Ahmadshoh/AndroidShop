<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories'    => Category::paginate(20)
        ]);
    }


    public function create()
    {
        return view('admin.category.create', [
            'category'  => [],
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('admin.category.index')->with('success', "Категория успешно добавлен в базу!");
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category'  => $category,
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.category.index')->with('success', "Категория успешно изменён!");
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', "Категория успешно удалён!");
    }
}

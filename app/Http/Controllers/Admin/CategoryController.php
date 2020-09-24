<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string',
        ]);

        Category::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string',
        ]);

        $category->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('categories.index');
    }

}

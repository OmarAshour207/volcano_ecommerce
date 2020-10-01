<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::where('parent_id', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('dashboard.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'parent_id'     => 'sometimes|nullable|numeric'
        ]);

        Category::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::where('parent_id', null)
            ->where('id', '!=', $category->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.categories.edit',
                compact('category', 'parentCategories'));
    }

    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'parent_id'     => 'sometimes|nullable|numeric'
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

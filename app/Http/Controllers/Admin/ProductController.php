<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
            'brand'             => 'required|string',
            'rate'              => 'required|numeric',
            'price'             => 'required|numeric',
            'offer_price'       => 'required|numeric',
            'category_id'       => 'sometimes|nullable|numeric',
            'status'            => 'required|numeric',
        ]);
        $images = '';
        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $data['image'] = $images;

        Product::create($data);
        session()->flash('success', 'Added Successfully');
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.products.edit',
                compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
            'brand'             => 'required|string',
            'rate'              => 'required|numeric',
            'price'             => 'required|numeric',
            'offer_price'       => 'required|numeric',
            'category_id'       => 'sometimes|nullable|numeric',
            'status'            => 'required|numeric',
        ]);
        $images = '';
        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $data['image'] = $images;

        $product->update($data);
        session()->flash('success', 'Updated Successfully');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            $imagesName = explode('|', $product->image);
            for ($i = 0; $i < count($imagesName);$i++) {
                if ($imagesName[$i] != '') {
                    Storage::disk('local')->delete('public/products/' . $imagesName[$i]);
                }
            }
        }
        $product->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect()->route('products.index');

    }
}

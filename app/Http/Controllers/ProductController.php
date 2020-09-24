<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(Request $request)
    {
        $aboutUs = About::first();
        $product = Product::findOrFail($request->route('id'));
        $similarProducts = $this->getSimilarProducts($product);

        return view('site.single_product',
                compact('product', 'aboutUs',
                                'similarProducts'));
    }

    public function getSimilarProducts($product)
    {
        return Product::searchCategory($product->category_id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
    }

}

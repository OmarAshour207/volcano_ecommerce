<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $imageName = Image::make($request->image)
            ->resize($request->width, $request->height)
            ->encode('jpg');
        Storage::disk('local')->put('public/' . $request->path .'/'. $request->image->hashName(), (string) $imageName, 'public');
        return $request->image->hashName();
    }

    public function removePhoto(Request $request)
    {
        Storage::disk('local')->delete('public/' . $request->path .'/'. $request->image);
        return "Removed";
    }

    public function removeProductImage(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $imagesName = explode('|', $product->image);
        $newImagesName = '';
        for ($i = 0;$i < count($imagesName); $i++) {
            if ($imagesName[$i] != $request->id && $imagesName[$i] != '') {
                $newImagesName .= $imagesName[$i] . '|';
            }
        }
        $product->update(['image' => $newImagesName]);
        Storage::disk('local')->delete('public/products/' . $request->id);
        return "Removed";
    }

    public function uploadProductImage(Request $request)
    {
        $imageName = Image::make($request->file)
            ->resize($request->width, $request->height)
            ->encode('jpg');
        Storage::disk('local')->put('public/products/'.$request->file->hashName(), (string) $imageName, 'public');
        return response()->json([
            'name'          => $request->file->hashName(),
            'original_name' => $request->file->getClientOriginalName()
        ]);
    }
}

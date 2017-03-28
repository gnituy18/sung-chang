<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Photo;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $path = $request->file('photo')->store('photos');
        $photo = new Photo;
        $photo->path = $path;
        $photo->name = $request->name;
        $photo->product()->associate($product);
        $photo->save();
        return redirect()->route('products.show', ['product' => $product->eng_name]);
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo->path);
        $photo->delete();
        return back();
    }
}

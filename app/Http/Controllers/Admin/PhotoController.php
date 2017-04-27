<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Photo;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function update(Request $request, Photo $photo)
    {
        if ($request->order !== $photo->order) {
            $photoSwitch = Photo::where('product_id', $photo->product_id)->where('order', $request->order)->first();
            $temp = $photo->order;
            $photo->order = $photoSwitch->order;
            $photoSwitch->order = $temp;
            $photoSwitch->save();
        }

        $photo->name = $request->name;
        $photo->save();
        return redirect()->route('products.show', ['category' => $photo->product->category->eng_name , 'product' => $photo->product->eng_name]);
    }
    public function up(Request $request, Photo $photo)
    {
        if ($photo->order !== 1) {
            $photoSwitch = Photo::where('product_id', $photo->product_id)->where('order', $photo->order - 1)->first();
            $photoSwitch->order += 1;
            $photo->order -= 1;
            $photo->save();
            $photoSwitch->save();
        }
        return redirect()->route('products.show', ['category' => $photo->product->category->eng_name , 'product' => $photo->product->eng_name]);
    }
    public function down(Request $request, Photo $photo)
    {
        if ($photo->order !== $photo->product->photos->count()) {
            $photoSwitch = Photo::where('product_id', $photo->product_id)->where('order', $photo->order + 1)->first();
            $photoSwitch->order -= 1;
            $photo->order += 1;
            $photo->save();
            $photoSwitch->save();
        }
        return redirect()->route('products.show', ['category' => $photo->product->category->eng_name , 'product' => $photo->product->eng_name]);
    }
    public function store(Request $request, Product $product)
    {
        $path = $request->file('photo')->store('photos');
        $img = Image::make($path)->orientate()->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        $photo = new Photo;
        $photo->path = $path;
        $photo->name = $request->name;
        $photo->order = $product->photos->count() + 1;
        $photo->product()->associate($product);
        $photo->save();
        return redirect()->route('products.show', ['category' => $product->category->eng_name , 'product' => $product->eng_name]);
    }

    public function destroy(Photo $photo)
    {
        $photos = Photo::where('product_id', $photo->product_id)->where('order', '>', $photo->order)->get();

        foreach ($photos as $p) {
            $p->order -= 1;
            $p->save();
        }
        Storage::delete($photo->path);
        $photo->delete();
        return back();
    }
}

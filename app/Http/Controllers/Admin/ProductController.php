<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create(Category $category)
    {
        return view('admin.product.create', ['category' => $category]);
    }

    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }

    public function destroy(Request $request, Product $product)
    {
        if (Auth::attempt(['name' => 'admin', 'password' => $request->password])) {
            foreach ($product->photos as $photo) {
                Storage::delete($photo->path);
                $photo->delete();
            }
            $product->delete();
            return redirect()->route('products.index');
        } else {
            return back();
        }
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->eng_name = $request->eng_name;
        $product->save();
        return redirect()->route('products.index');
    }

    public function store(ProductRequest $request)
    {
        $category = Category::where('id', $request->category)->first();
        $this->product->name = $request->name;
        $this->product->eng_name = $request->eng_name;
        $this->product->category()->associate($category);
        $this->product->save();

        return redirect()->route('products.index');
    }
}

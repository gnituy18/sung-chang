<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Photo;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product;
    }

    public function index(Category $category)
    {
        session(['tab' => $category->eng_name]);
        $productName = $category->products()->first();
        if (empty($productName)) {
            return view('admin.product.show', ['category' => $category]);
        }
        return redirect()->route('products.show', ['category' => $category->eng_name, 'product' => $productName->eng_name]);
    }

    public function create(Category $category)
    {
        return view('admin.product.create', ['category' => $category]);
    }

    public function show(Category $category, Product $product)
    {
        return view('admin.product.show', ['category' => $category, 'products' => Product::where('category_id', $category->id)->orderBy('order')->get() , 'product' => $product, 'photos' => Photo::where('product_id', $product->id)->orderBy('order')->get()]);
    }

    public function destroy(Request $request, Product $product)
    {
        if (Auth::attempt(['name' => 'admin', 'password' => $request->password])) {
            foreach ($product->photos as $photo) {
                Storage::delete($photo->path);
                $photo->delete();
            }
            $product->delete();
            return redirect()->route('products.index', ['category' => $product->category]);
        } else {
            return back();
        }
    }

    public function update(ProductRequest $request, Category $category, Product $product)
    {
        if ($request->order !== $product->order) {
            $productSwitch = Product::where('category_id', $category->id)->where('order', $request->order)->first();
            $temp = $productSwitch->order;
            $productSwitch->order = $product->order;
            $product->order = $temp;
            $productSwitch->save();
        }
        $product->name = $request->name;
        $product->eng_name = $request->eng_name;
        $product->save();
        return redirect()->route('products.show', ['category' => $product->category->eng_name, 'product' => $product->eng_name]);
    }

    public function store(ProductRequest $request, Category $category)
    {
        $this->product->name = $request->name;
        $this->product->eng_name = $request->eng_name;
        $this->product->order = Product::where('category_id', $category->id)->count() + 1;
        $this->product->category()->associate($category);
        $this->product->save();

        return redirect()->route('products.show', ['category' => $category, 'products' => Product::where('category_id', $category->id)->orderBy('order')->get() , 'product' => $this->product, 'photos' => Photo::where('product_id', $this->product->id)->orderBy('order')->get()]);
    }
}

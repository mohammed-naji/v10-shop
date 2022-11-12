<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $slider_products = Product::orderByDesc('id')->limit(2)->get();
        $categories = Category::orderByDesc('id')->get();

        $allproducts = Product::orderByDesc('id')->limit(9)->offset(2)->get();

        // dd($slider_products);

        return view('site.index', compact('slider_products', 'categories', 'allproducts'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function shop()
    {
        $products = Product::orderByDesc('id')->paginate(9);
        return view('site.shop', compact('products'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);

        // dd($category->products);

        return view('site.category')->with('category', $category);
    }

    public function product($id)
    {
        $product = Product::find($id);

        $next = Product::where('id', '>', $id)->first();
        $prev = Product::where('id', '<', $id)->orderByDesc('id')->first();
        // dd($prev);

        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->get();

        return view('site.product', compact('product', 'next', 'prev', 'related'));
    }

    public function review(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required',
            'content' => 'required'
        ]);

        Review::create([
            'star' => $request->rating,
            'content' => $request->content,
            'product_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }
}

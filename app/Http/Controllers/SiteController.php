<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $slider_products = Product::orderByDesc('id')->limit(2)->get();
        $categories = Category::orderByDesc('id')->get();

        // dd($slider_products);

        return view('site.index', compact('slider_products', 'categories'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function shop()
    {
        return view('site.shop');
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

}

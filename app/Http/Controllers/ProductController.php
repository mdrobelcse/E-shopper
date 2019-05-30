<?php

namespace App\Http\Controllers;


use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($id)
    {
        $categories = Category::latest()->groupitem()->get();
        $product = Product::findOrfail($id);
        return view('frontend.product.product_details',compact('product','categories'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(9);
        return view('frontend.product.products',compact('products'));
    }

    public function productsByCategory($id)
    {
        $products = Product::where('category_id',$id)->paginate(3);
        return view('frontend.product.product_by_category',compact('products'));
    }


    public function productsByBrand($id)
    {

        $products = Product::where('brand_id',$id)->paginate(3);
        return view('frontend.product.product_by_brand',compact('products'));
    }


}

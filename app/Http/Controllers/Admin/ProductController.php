<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'image' => 'required',

        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            $request->file('image')->storeAs('public/product', $imageName);

            $thumbnailpath = public_path('storage/product/'.$imageName);
            $img = Image::make($thumbnailpath)->resize(1000, 800, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

        } else {
            $imageName = "default.png";
        }
        $product = new Product();
        $product->admin_id = Auth::id();
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->slug = $slug;
        $product->image = $imageName;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->save();

        Toastr::success('Product Successfully Saved :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrfail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrfail($id);
        return view('admin.product.edit',compact('categories','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'image' => 'image',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $product = Product::find($id);
        if(isset($image))
        {
           // make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }
           // delete old post image
            if(Storage::disk('public')->exists('product/'.$product->image))
            {
                Storage::disk('public')->delete('product/'.$product->image);
            }

            //upload file
            $request->file('image')->storeAs('public/product', $imageName);


            $productImage = public_path('storage/product/'.$imageName);
            $img = Image::make($productImage)->resize(1000, 800, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($productImage);

        } else {
            $imageName = $product->image;
        }

        $product->admin_id = Auth::id();
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->slug = $slug;
        $product->image = $imageName;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->save();

        Toastr::success('Product Successfully Updated :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);

        if (Storage::disk('public')->exists('product/'.$product->image))
        {
            Storage::disk('public')->delete('product/'.$product->image);
        }
        $product->delete();
        Toastr::success('Product Successfully Deleted :)','Success');
        return redirect()->back();
    }
}

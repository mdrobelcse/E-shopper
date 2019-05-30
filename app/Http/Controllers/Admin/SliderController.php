<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->heading);
        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }

            $request->file('image')->storeAs('public/slider', $imageName);

            $thumbnailpath = public_path('storage/slider/'.$imageName);
            $img = Image::make($thumbnailpath)->resize(484, 441, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

        } else {
            $imageName = "default.png";
        }

        $slider = new Slider();
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->image = $imageName;
        $slider->save();
        Toastr::success('Slider Successfully Saved :)' ,'Success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrfail($id);
        return view('admin.slider.edit',compact('slider'));
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
            'heading' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->heading);
        $slider = Slider::findOrfail($id);
        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }
            // delete old slider image
            if(Storage::disk('public')->exists('slider/'.$slider->image))
            {
                Storage::disk('public')->delete('slider/'.$slider->image);
            }

            //upload file
            $request->file('image')->storeAs('public/slider', $imageName);

            $thumbnailpath = public_path('storage/slider/'.$imageName);
            $img = Image::make($thumbnailpath)->resize(484, 441, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

        } else {
            $imageName = $slider->image;
        }

        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->image = $imageName;
        $slider->save();
        Toastr::success('Slider Successfully Updated :)' ,'Success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrfail($id);

        if (Storage::disk('public')->exists('slider/'.$slider->image))
        {
            Storage::disk('public')->delete('slider/'.$slider->image);
        }
        $slider->delete();
        Toastr::success('Slider Successfully Deleted :)','Success');
        return redirect()->back();
    }
}

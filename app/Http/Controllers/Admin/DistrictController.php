<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::latest()->get();
        return view('admin.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('admin.district.create',compact('divisions'));
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

             'district_name'=>'required|unique:districts',
             'division'=>'required',

        ]);

        $district = new District();
        $district->district_name = $request->district_name;
        $district->slug = str_slug($request->district_name);
        $district->div_id = $request->division;
        $district->save();
        Toastr::success('District saved successfully:)','Success');
        return redirect()->route('admin.district.index');



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
        $district = District::findOrfail($id);
        $divisions = Division::all();
        return view('admin.district.edit',compact('divisions','district'));
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

            'district_name'=>'required',
            'division'=>'required',

        ]);

        $district = District::findOrfail($id);
        $district->district_name = $request->district_name;
        $district->slug = str_slug($request->district_name);
        $district->div_id = $request->division;
        $district->save();
        Toastr::success('District saved Updated:)','Success');
        return redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrfail($id);
        $district->delete();
        Toastr::success('District deleted successfully :)','Success');
        return redirect()->back();
    }
}

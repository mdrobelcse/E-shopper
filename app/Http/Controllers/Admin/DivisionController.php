<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisoins = Division::latest()->get();
        return view('admin.division.index',compact('divisoins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.division.create');
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

            'division_name' => 'required|unique:divisions'

        ]);

        $division  = new Division();
        $division->division_name = $request->division_name;
        $division->slug = str_slug($request->division_name);
        $division->save();
        Toastr::success('Division saved successfully:)','Success');
        return redirect()->route('admin.division.index');

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
        $division = Division::findOrfail($id);
        return view('admin.division.edit',compact('division'));
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

            'division_name' => 'required'

        ]);

        $division  = Division::findOrfail($id);
        $division->division_name = $request->division_name;
        $division->slug = str_slug($request->division_name);
        $division->save();
        Toastr::success('Division updated successfully:)','Success');
        return redirect()->route('admin.division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::findOrfail($id);
        $division->delete();
        Toastr::success('Division deleted successfully:)','Success');
        return redirect()->back();
    }
}

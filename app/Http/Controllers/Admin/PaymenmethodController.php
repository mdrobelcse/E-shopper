<?php

namespace App\Http\Controllers\Admin;

use App\Paymentmethod;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymenmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = Paymentmethod::latest()->get();
        return view('admin.payment_method.index',compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.create');
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

           'payment_name'=>'required|unique:paymentmethods',
           'account_type'=>'required',
           'number'=>'required|unique:paymentmethods',
           'description'=>'required',

       ]);


        $payment_method = new Paymentmethod();
        $payment_method->payment_name = $request->payment_name;
        $payment_method->slug = str_slug($request->payment_name);
        $payment_method->account_type = $request->account_type;
        $payment_method->number = $request->number;
        $payment_method->description = $request->description;
        $payment_method->save();
        Toastr::success('Payment method successfully saved:)','Success');
        return redirect()->route('admin.payment.index');


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
        $payment_method = Paymentmethod::findOrfail($id);
        return view('admin.payment_method.edit',compact('payment_method'));
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

            'payment_name'=>'required',
            'account_type'=>'required',
            'number'=>'required',
            'description'=>'required',

        ]);


        $payment_method = Paymentmethod::findOrfail($id);
        $payment_method->payment_name = $request->payment_name;
        $payment_method->slug = str_slug($request->payment_name);
        $payment_method->account_type = $request->account_type;
        $payment_method->number = $request->number;
        $payment_method->description = $request->description;
        $payment_method->save();
        Toastr::success('Payment method successfully Updated:)','Success');
        return redirect()->route('admin.payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_method = Paymentmethod::findOrfail($id);
        $payment_method->delete();
        Toastr::success('Payment method deleted successfully saved:)','Success');
        return redirect()->back();
    }
}

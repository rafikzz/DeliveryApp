<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use DataTables;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $drivers =Driver::latest()->get();
        return view('drivers.index',compact('drivers'))->with('i', (request()->input('page', 1) - 1) );;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      Driver::create($this->driverCreateValidate());
      return redirect()->route('drivers.index')->with('sucess','Driver has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show',compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {

        return view('drivers.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {

        $driver->update($this->driverEditValidate());
        return redirect()->route('drivers.index')->with('sucess','Driver has been created');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('drivers.index')->with('success','Driver deleted successfully');
    }
    public function driverCreateValidate()
    {
            return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email|unique:drivers',
            'contact_no' => 'required',
            'address' => 'required',


        ]);
    }
    public function driverEditValidate()
    {
            return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required',


        ]);
    }


}

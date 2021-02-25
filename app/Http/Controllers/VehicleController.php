<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $data=Vehicle::latest()->get();
        return view('vehicles.index',['vehicle'=>$data])->with('i','0');
    }

    	public function store(Request $req)
    {
    	$vehicle = new Vehicle;
    	$vehicle->name = $req->name;
    	$vehicle->lotno = $req->lotno;
    	$vehicle->save();
        return redirect()->route('vehicles.index');
    }
    public function create()
    {
        return view('vehicles.create');
    }

    public function delete($id)
    {
        $data = Vehicle::find($id);
        $data->delete();
        return redirect()->route('vehicles.index');
    }

    public function update(Request $req)
    {
        $vehicle = Vehicle::find($req->id);
        $vehicle->name = $req->name;
        $vehicle->lotno = $req->lotno;
        $vehicle->save();
        return redirect()->route('vehicles.index');
    }

    public function edit($id)
    {
        $data = Vehicle::find($id);
        return view('vehicles.edit',['data'=> $data]);
    }
}

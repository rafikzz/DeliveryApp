<?php

namespace App\Http\Controllers;

use App\Models\AssignDelivery;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AssignDeliveryController extends Controller
{
    function assign(Delivery $delivery){


        if( $delivery->status->name != 'pending'){

            return abort('404');
        }
        $drivers=Driver::orderBy('first_name','asc')->get();
        $vehicles=Vehicle::get();
        return view('assigndeliveries.create',compact('drivers','vehicles','delivery'));
    }

    function store(Request $request){

        $driver=Driver::findOrFail( $request->driver_id);
        $vehicle=Vehicle::findOrFail( $request->vehicle_id);
        $delivery=Delivery::findOrFail($request->delivery_id);
        $subject='Delivery was assigned to you';
        if($delivery->status->name != 'pending'){
            return redirect()->route('deliveries.index')->with('success','Delivery has been successfully assigned');
        }


        $delivery->assigned_delivery()->create($this->requestValidate());
        $delivery->status_id='4';
        Mail::send('deliveryAssignmentMail', compact('delivery','driver','vehicle'), function ($message) use($driver,$subject) {
            $message->from('deliveryManagement@mail.com');
            $message->to($driver->email);
            $message->subject($subject);
            });
        $delivery->save();

       return redirect()->route('deliveries.index')->with('success','Delivery has been successfully assigned');
    }

    function requestValidate(){
        return request()->validate([
            'delivery_id'=>'required',
            'driver_id' =>'required',
            'vehicle_id' =>'required',
        ]);
    }

}

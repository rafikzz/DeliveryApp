<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','delivery_address','unit_id','status_id','quantity'];

    /**
     * Get the customer that owns the Delivery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function status()
    {
        return $this->belongsTo(DeliveryStatus::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function assigned_delivery(){

        return $this->hasOne(AssignDelivery::class,'delivery_id');

    }
    public function driver()
    {

            return $this->assigned_delivery->driver();


    }
    public function vehicle()
    {

        return $this->assigned_delivery->vehicle();

    }

}

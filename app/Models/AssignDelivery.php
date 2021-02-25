<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDelivery extends Model
{
    use HasFactory;

    protected $fillable=['delivery_id','driver_id','vehicle_id'];    /**
     * Get the delivery_request associated with the AssignDelivery
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function delivery_request()
    {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }
}

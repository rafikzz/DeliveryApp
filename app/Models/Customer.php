<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','address','contact_no'];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
    public function name(){
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

}

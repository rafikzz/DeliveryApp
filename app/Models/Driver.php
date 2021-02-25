<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','contact_no','address'];

    public function name(){
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }
}

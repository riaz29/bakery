<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table='customers';

    public $fillable = ['name','mobile_no','address'];
    
    public  function order(){
        return $this->hasMany(Order::class);
    }

    public  function account(){
        return $this->hasMany(Account::class);
    }

}

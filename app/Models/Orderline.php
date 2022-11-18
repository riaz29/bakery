<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;

    protected $table='orderlines';

    public $fillable = ['menu_name','menu_type','price','unit','amount','order_id'];

    public function order()
    {
           return $this->belongsTo(Order::class);
    }

}

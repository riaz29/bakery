<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public $fillable = ['order_id','service_amount','fare_amount','advance_amount','remaining_amount','adjust_amount','total_amount'];

    public function order()
    {
           return $this->belongsTo(Order::class);
    }
}

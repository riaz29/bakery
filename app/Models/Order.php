<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $fillable = ['booking_date','delivery_date','delivery_address','service_keeper','order_note','order_amount','customer_id'];

    public function customer()
    {
           return $this->belongsTo(Customer::class);
    }
    
    public function bill()
    {
           return $this->hasOne(Bill::class);
    }
    public function orderline()
    {
           return $this->hasMany(Orderline::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $fillable = ['customer_id','received_date','amount','note_text'];

    public function customer()
    {
           return $this->belongsTo(Customer::class);
    }
}

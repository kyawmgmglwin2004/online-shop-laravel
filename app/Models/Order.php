<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
        
    }
    public function order()
    {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  App\Models\User;
use App\Models\Order_item;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'total_price',
        'status',
        'shipping_address',
        'phone',
        'payment_method' ,
        'payment_status' 
        ];
    public function user()
{
    return $this->belongsTo(User::class);
}
    public function order_item()
{
    return $this->hasMany(Order_item::class);
}

       
    
}

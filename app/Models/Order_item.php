<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;
use App\Models\Artwork;
class Order_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'price',
        'quantity',
        'artwork_id',
         
        ];
   public function artwork()
{
    return $this->belongsTo(Artwork::class);
}
    public function order(){
        return $this->belongsTo(Order::class);
    }

   
}

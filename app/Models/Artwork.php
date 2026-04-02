<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Models\Order_item;

class Artwork extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'quantity',
        'image',
        'created_at' ,
        'updated_at' 
        ];
    public function purchases()
{
    return $this->hasMany(Purchase::class);
}
    public function order_item()
{
    return $this->hasMany(Order_item::class);
}

        
}
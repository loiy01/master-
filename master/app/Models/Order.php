<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
            'user_id',
            'total_order',
            'status',
            'delivery_location',
            
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
                    ->withPivot('quantity');
    }
    public function order_products()
    {
        return $this->hasMany(order_products::class);
    }
    

    
    
  
 
}


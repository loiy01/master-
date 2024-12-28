<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainteance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manufacturer_name',
        'description',
        'show',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}

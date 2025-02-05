<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_type',
        'time',
        'description',
        'show',
        'location',
    ];
    
    
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'is_super',
    ];

    protected $hidden = [
        'password',
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function users(){
        return $this->hasmany(User::class);
    }
    
    



}

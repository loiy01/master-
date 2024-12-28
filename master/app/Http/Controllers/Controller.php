<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Order;
use App\Models\Message;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
   
    
}

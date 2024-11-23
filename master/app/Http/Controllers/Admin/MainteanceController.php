<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mainteance;
use Illuminate\Http\Request;

class MainteanceController extends Controller
{
    public function index(){
        $mainteances=Mainteance::all();
        return view("admin.mainteance_requests.index" ,compact("mainteances"));
    }
}

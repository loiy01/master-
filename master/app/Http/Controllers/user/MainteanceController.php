<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Mainteance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainteanceController extends Controller
{
    public function index(){
        return view("auth.user.Mainteance.Mainteance");
    }
    public function store(Request $request){
        $validated = $request->validate([
            "manufacturer_name"=>"required|string|max:255",
            "description"=>"required|string|max:255",
        ]);
        if(Auth::check()){
            Mainteance::create([
                'user_id' => Auth::id(),
                "manufacturer_name"=>$validated["manufacturer_name"],
                "description"=>$validated["description"],
                'show' => false,
            ]);
            return redirect()->back()->with('success', 'تم إضافة الحجز بنجاح.');
        } else {
            // إعادة التوجيه مع رسالة خطأ
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول أولاً.');
        };    
    }
}

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
    public function toggleStatus($id)
    {
        // البحث عن السجل في جدول Mainteance
        $main = Mainteance::findOrFail($id);
    
        // تبديل حالة is_active
        $main->show = !$main->show;
    
        // حفظ التغيير في قاعدة البيانات
        $main->save();
    
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.mainteance_requests.index')->with('success', 'Maintenance status updated successfully!');
    }
    
}

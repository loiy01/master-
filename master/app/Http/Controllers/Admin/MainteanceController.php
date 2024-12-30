<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mainteance;
use Illuminate\Http\Request;

class MainteanceController extends Controller
{
    public function index(Request $request)
{
    // إذا كان الفلتر موجودًا
    $show_filter = $request->get('show_filter');

    // تطبيق الفلتر إذا كان موجودًا
    if ($show_filter !== null) {
        $mainteances = Mainteance::where('show', $show_filter)->paginate();
    } else {
        $mainteances = Mainteance::paginate(10);
    }

    return view("admin.mainteance_requests.index", compact("mainteances"));
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

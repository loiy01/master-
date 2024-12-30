<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index(Request $request)
    {
        // تحقق من وجود الفلتر 'show' في الـ request
        $show = $request->input('show');
    
        // إذا كان الفلتر 'show' موجودًا وكان غير فارغ، نقوم بتصفية البيانات بناءً عليه
        if ($show !== null) {
            // إذا كان الفلتر مفعلًا، نقوم باستخدام paginate مع الفلتر
            $appointments = Appointments::where('show', $show)->paginate(5);
        } else {
            // إذا لم يكن هناك فلتر، نقوم بجلب جميع السجلات مع التصفح
            $appointments = Appointments::paginate(5);
        }
    
        // إرجاع الـ view مع الـ appointments المفلترة أو جميعها
        return view("admin.appointments.index", compact("appointments"));
    }

      public function toggleStatus($id)
      {
          // البحث عن السجل في جدول Mainteance
          $appointments = Appointments::findOrFail($id);
      
         
          $appointments->show = !$appointments->show;
      
          // حفظ التغيير في قاعدة البيانات
          $appointments->save();
      
          // إعادة التوجيه مع رسالة نجاح
          return redirect()->route('admin.appointments.index')->with('success', 'Maintenance status updated successfully!');
      }
}

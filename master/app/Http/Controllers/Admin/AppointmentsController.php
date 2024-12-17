<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
      public function index(){
        $appointments = Appointments::all();
        return view("admin.appointments.index",compact("appointments"));
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

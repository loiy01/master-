<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view("auth.user.contact");
    }

    public function store(Request $request){
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Message' => 'required',
        ]);
    
        Message::create([
            'email' => $request->Email,
            'message_subject' => $request->Name,
            'message_text' => $request->Message,
        ]);
    
        return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح.');
    }
}

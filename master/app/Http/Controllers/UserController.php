<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("admin.users.user",compact("users"));
    }
    public function distroy($id){
         $user = User::findOrFail($id);
        $user->delete();
       
        return redirect()->route('admin.user.index')->with('success', 'Product deleted successfully!');
    }
    public function about(){
        return view("auth.user.about");
    }
 
    

    
}

    
    
    
    


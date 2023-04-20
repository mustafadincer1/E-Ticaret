<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login_page(){
        return view('admin.login');
    }

    public function login(Request $request){
  
        $request ->validate([
            'email'=> 'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email' =>  $request->email, 'password' =>  $request->password,'is_admin'=>1], $request->has('benihatirla') )){
            return redirect()->route('admin.anasayfa');
        }else{
           
                $errors = ['email' => 'Hatalı giriş'];
                
                return back()->withInput()->withErrors($errors);

            
        }

    }

    public function logout(){
        auth()->logout();
        
        return redirect()->route('admin.giriş');
    }
}

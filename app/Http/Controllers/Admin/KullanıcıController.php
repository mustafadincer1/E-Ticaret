<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class KullanıcıController extends Controller
{
    public function index(){
        $tmp = User::orderByDesc('olusturma_tarihi')->paginate(7);
         return view('admin.kullanıcı.index',compact('tmp'));
    }
    public function edit($id){
        $user = new User;
        $user = User::find($id);
        return view('admin.kullanıcı.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name_surname' => 'required|string',
            'email'=> 'required',
        ]);
        

        $data =$request->only('name_surname','email');
        $user = User::where('id',$id)->firstOrFail();

        

        if($request->filled('password')){
            $data['password']=Hash::make($request->password);
            $user->update(['password' =>Hash::make($request->password)]);

        }

        if($request->has('activation')){
            $data['activation'] = 1;
        }
        else{
            $data['activation'] = 0;
        
        }
        if($request->has('is_admin')){
            $data['is_admin'] = 1;
        }
        else{
            $data['is_admin'] = 0;
        
        }
        $user->update(['name_surname' => $request->name_surname,'email' => $request->email,
                        'activation' => $data['activation'],'is_admin'=> $data['is_admin'] ]);
        
        
        UserDetail::updateOrCreate(
            ['user_id' =>$id],
            ['adres' => $request->adress,
            'telefon'=>$request->phone,
            'ceptelefonu' => $request->mobilephone
        ]);
      

        return redirect()->route('admin.kullanıcı.edit',$id)
            ->with('message','Kullanıcı Güncellendi')
            ->with('message_type','success');

    }

    public function delete($id){
       
        User::destroy($id);
        // return route('admin.kullanıcı')
        //  ->with('message', 'Kullanıcı Silindi')
        //  ->with('message_type','success');
    }


}

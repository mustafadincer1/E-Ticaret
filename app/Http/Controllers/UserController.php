<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\UserSignIn;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Carts;
use App\Models\CartsProduct;
use Illuminate\Support\Facades\Hash;
use App\Models\UserDetail;


class UserController extends Controller
{
    public function login_page(){
        return view('user.login');
    }



    public function sign_in_page(){
        return view('user.sign_in');
    }

    public function sign_in(Request $request){
        $request->validate([
            'name_surname' => 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=>'required|string|confirmed|min:5|max:50'
        ]);
       
      $user=  User::create([
        'name_surname'=>$request->name_surname,
        'password'=>Hash::make($request->password),
        'email'=>($request->email),
        'activation_code'=>Str::random(60),
        'activation'=>0
    ]);
    $user->detail()->save(new UserDetail());

        Mail::to($request->email)->send(new UserSignIn($user));

        auth()->login($user);

        return redirect()->route('anasayfa');
    }



    public function activate($code){
        $user = User::where('activation_code', $code)->first();

        if(!is_null($user)){
            $user->activation_code = null;
            $user->activation = 1;
            $user->save();

            return redirect()->to('/')
                            ->with('message','Kayıdınız Aktifleştirildi')
                            ->with('message_type','success');

        }

    }


    public function login(Request $request){
        $request ->validate([
            'email'=> 'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email' =>  $request->email, 'password' =>  $request->password], $request->has('benihatirla') )){
            $request->session()->regenerate();
            Cart::session(Auth::id());
      
           



            $aktif_sepet_id = Carts::aktif_sepet_id();

            if (is_null ($aktif_sepet_id) ) {
                $aktif_sepet = Carts::create(['user_id' => Auth::id()]);
                $aktif_sepet_id = $aktif_sepet->id;
            }

            
            session()->put('aktif_sepet_id', $aktif_sepet_id);
           
           

            if (count(Cart::Getcontent())>0) {
              
                foreach (Cart::Getcontent() as $CartItem) {
                    CartsProduct::updateOrCreate(
                        ['cart_id'=>$aktif_sepet_id,'product_id'=>$CartItem->id,"durum"=>"beklemede"],
                        ['adet'=>$CartItem->quantity, 'fiyati'=>$CartItem->price] 
                    );
                    # code...
                }
                # code...
            }
            
       
           
            Cart::clear();
            $CartProducts = CartsProduct::where('cart_id',$aktif_sepet_id)->get();

     

    
          

      
   

            foreach ($CartProducts as $CartProduct) {
                // ->add($CartProduct->product->id,$CartProduct->product->ürün_adi,$CartProduct->fiyati,$CartProduct->adet);
           
                Cart::session(Auth::id())->add(array(
                    'id' => $CartProduct->product->id,
                    'name' => $CartProduct->product->ürün_adi,
                    'price' => $CartProduct->fiyati,
                    'quantity' => $CartProduct->adet,
                    'durum' => "beklemede"
                ));
            }
          
            return view('sepet');

        }else {
            $errors = ['email' => 'Hatalı giriş'];
            
            return back()->withErrors($errors);
        };


    }

    public function logout(){
        auth()->logout();
        
        return redirect()->route('anasayfa');
    }
}

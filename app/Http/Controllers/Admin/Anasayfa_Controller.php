<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
class Anasayfa_Controller extends Controller
{
    public function index(){
        return view('admin.anasayfa');
    }
}

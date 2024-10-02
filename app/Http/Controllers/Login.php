<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Login extends Controller
{
    function index ()
    {
        return view ("login");
    }
    function cek (Request $request)
    {
        Session::flash('username',$request->username);
       

        $infologin = [
            'name' => $request->username,
            'password' => $request->password
        ];
        
        if(Auth::attempt($infologin)){
            //kalau otentikasi sukses
            return redirect()->route('login');
        } else {
            //kalau otentikasi gagal
           return redirect()->route('beranda');
        }
        // return "OK";
    }

} 
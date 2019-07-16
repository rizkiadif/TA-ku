<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index () {
    	// dd(Auth::user());
    	return view ('index');
    }

    function login() {
    	return view('login');
    }

    function proses_login(Request $r) {
    	$login=new App\Login;
    	$login_berhasil=Auth::attempt(['username'=>$r->username,'password'=>$r->password]);
    	if ($login_berhasil==true){
    		return redirect('/pakar');

      	}
      	else
      	{
      		return redirect('/login')->with('status', 'login gagal!');
      	}
    }

    function logout() {
      Session::flush();
      return redirect('/login');
    }
}

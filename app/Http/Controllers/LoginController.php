<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LRequest;
use App\User;
use Hash;
use DB;

class LoginController extends Controller {

public function postdangnhap(LRequest $request){
		$login =[
			'username'=>$request->txtUser,
			'password'=>$request->txtPass
		];
		if(auth::attempt($login)){
			return redirect()->route('checkout');
		}else{
			return redirect()->back();
		}
	}

	public function getdangnhap(){
		return view('user.login');
	}

}

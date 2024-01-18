<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login(){

		return view(
			'auth.login',[
			'title' => 'Login'
			]
		);
	}
	
	
	public function authenticate(Request $request){
		$credentials = $request->only('name', 'password');
		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect('manhwas');
		}
		
		return back()->withErrors([
			'name' => 'Authentication error',
		]);
	}
	
	
	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

}

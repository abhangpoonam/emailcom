<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoginModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
class LoginController extends Controller
{
    public function validateForm(Request $request){
       
        if(empty($request->input('email')) && empty($request->input('password'))){
           $this->validate($request,[
               'email' => 'required|unique:loginmaster',
               'password' => 'required'
           ]);
        }else{
            $checkuser = new LoginModel();
            $response = $checkuser->authorize($request->input('email'),$request->input('password'));
          //print_r($request->session()->get('loginid'));exit;
            if(!empty($response)){
              $request->session()->put('loginid',$response['loginid']); 
              $request->session()->put('email',$response['EmailAddress']); 
              return redirect('/dashboard');
            }
        }
    }
}

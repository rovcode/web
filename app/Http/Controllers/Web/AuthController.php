<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Helpers\Api;

class AuthController extends Controller
{
    private $serviceLogin = 'login';
    private $serviceRegister = 'register';

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login_user(Request $request)
    {
        $client = new Client();
        $res = $client->request('POST', Api::endpoint().$this->serviceLogin , [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
        ]); 
        if(!$res)
        {
            return view('home');
        }else{
            return view('auth.login');
        }    
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register_user(Request $request)
    {
        $client = new Client();
        $res = $client->request('POST', Api::endpoint().$this->serviceRegister , [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ],
        ]);  
    }
}

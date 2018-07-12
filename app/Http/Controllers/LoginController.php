<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function show (){
        return view('login');
    }

    public function  oauth(){
        $authUrl = $this->provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $this->provider->getState();
        return redirect($authUrl);
    }

    public function oauth_callback(){

        if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            throw new Exception('invalid state');
        }
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        $_SESSION['token'] = serialize($token);
        return view('oauth_callback',['token'=>$_SESSION['token']]);
    }
}

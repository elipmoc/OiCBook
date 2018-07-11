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
        return view('oauth_callback');
    }
}

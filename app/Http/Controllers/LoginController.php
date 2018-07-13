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
        $resourceOwner = $this->provider->getResourceOwner($token);

        $_SESSION['token'] = serialize($token);
        $_SESSION['resourceOwner'] = serialize($resourceOwner);
        return redirect('/show_oauth');
    }

    public  function  show_oauth(){
        return view('show_oauth',['token'=>$_SESSION['token'],"resourceOwner"=>$_SESSION['resourceOwner']]);
    }
}

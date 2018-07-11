<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    protected  $provider;
    public function  __construct()
    {
        session_start();
        $this->provider = new \GoogleOAuth([
            'clientId' => env("GOOGLE_OAUTH_CLIENT_ID"),
            'clientSecret' => env("GOOGLE_OAUTH_CLIENT_SECRET"),
            'redirectUri' => 'http://localhost:8000/oauth_callback'
        ]);
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function Callback()
    {
        $user = Socialite::driver('facebook')->user();

        $user->getName();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\UserFacebook;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\Http\Controllers;
use Guzzle\Service\Builder;
use DB;

class FacebookController extends Controller
{

    public function Facebook()
    {
        return Socialite::with('facebook')->redirect();


    }


    public function Callback()
    {
        $user = Socialite::with('facebook')->user();

        $db = UserFacebook::where('idfacebook', $user->getId())->first();
        if ($db) {

            $datas = DB::table('users_facebook')
                ->where('users_facebook.idfacebook', '=',$user->getId())
                ->get();

            return view('callback')->withDatas($datas);

        } else {
            $facebook = new UserFacebook();
            $facebook->idfacebook = $user->getId();
            $facebook->username = $user->getId();
            $facebook->name = $user->getName();
            $facebook->social = 'facebook';
            $facebook->email = $user->getEmail();
            $facebook->avatar = $user->getAvatar();

            $facebook->save();

            $datas = DB::table('users_facebook')
                ->where('users_facebook.idfacebook', '=',$user->getId())
                ->get();

            return view('callback')->withDatas($datas);

        }
    }


}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = "/photographer";
    protected $loginPath = "/photographer";
    protected $redirectAfterLogout = "/";


    public function checklogin()
    {
        $db = User::where('email')->first();
        if ($db) {
            $datas = DB::table('users')
                ->where('users.email', '=', Auth::user()->email)
                ->get();

            return view('home')->withDatas($datas);
        } else {
            return view('/auth/login');
        }
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])

        ]);
    }

    public function redirecToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

   /* public function  handleProviderCallback()
    {

        $user = Socialite::driver('facebook')->user();

        $db = User::where('idfacebook', $user->getId())->first();
        if ($db) {

            $datas = DB::table('users')
                ->where('users.idfacebook', '=', $user->getId())
                ->get();

            return redirect('/home')->withDatas($datas);

        } else {
            $facebook = new User();
            $facebook->idfacebook = $user->getId();
            $facebook->image = $user->getAvatar();
            $facebook->name = $user->getName();
            $facebook->email = $user->getEmail();
            $facebook->password = $user->getEmail();


            $facebook->save();

            $datas = DB::table('users')
                ->where('users.idfacebook', '=', $user->getId())
                ->get();

            return redirect('/home')->withDatas($datas);
        }
    }*/
}

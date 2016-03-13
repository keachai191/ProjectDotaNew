<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;

class UpdateController extends Controller
{
    public function update($id, Request $request)

    {
        $image = $request->input('image');
        $name = $request->input('name');
        $addres = $request->input('addres');
        $website = $request->input('website');
        $phonenumber = $request->input('phonenumber');
        $fullprice = $request->input('fullprice');
        $halfprice =$request->input('halfprice');

        $user = User::find($id);
        $user->image = $image;
        $user->name = $name;
        $user->addres =$addres;
        $user->website =$website;
        $user->phonenumber =$phonenumber;
        $user->fullprice = $fullprice;
        $user->halfprice = $halfprice;

        $user->save();
        return redirect('home');
    }
}

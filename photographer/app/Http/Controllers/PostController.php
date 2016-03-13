<?php

namespace App\Http\Controllers;

use App\Models\Photographer as Photographer;

class PostController extends Controller


{
    public function Add()
    {
        $email = \Input::get('email');
        $CheckUser = \App\Models\Photographer::where('email', $email)->get();

        if (count($CheckUser) == 0) {
            $addData = new Photographer();
            $addData->id = \Input::get('id');
            $addData->name = \Input::get('name');
            $addData->addres = \Input::get('addres');
            $addData->website = \Input::get('website');
            $addData->email = \Input::get('email');
            $addData->phonenumber = \Input::get('phonenumber');
            $addData->save();

            $checkUser = \App\Models\Photographer::where('email', $email)->get();
            return view('/edit')->with('data', $checkUser);

        }else{
            $checkUser = \App\Models\Photographer::where('email', $email)->get();
            return view('/edit')->with('data', $checkUser);

        }

    }


   /* public function Update()
    {
        $updatedata = \App\Models\Photographer::find(id);

        $updatedata->id = \Input::get('id');
        $updatedata->name = \Input::get('name');
        $updatedata->addres = \Input::get('addres');
        $updatedata->website = \Input::get('website');
        $updatedata->email = \Input::get('email');
        $updatedata->phonenumber = \Input::get('phonenumber');
        $updatedata->save();

        $updatedata = \App\Models\Photographer::find(\Input::get('id'));
        return view('/edit')->with('data', $updatedata);

    }*/


}







<?php

namespace App\Http\Controllers;

use App\Models\Album as Album ;
use App\Models\Photographer;
use App\Models\Calendar;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    public function  getName()
    {
        header('content-type:text/html; charset=utf-8');




    /*$facebook = Facebook::all();
    foreach ($facebook as $facebooks){
        echo $facebooks->id;
        echo $facebooks->name;
        echo $facebooks->website;
        echo $facebooks->email;
        echo $facebooks->addres;
        echo $facebooks->phonenumber;

    }*/

         /*echo "<table><caption>ข้อมูลจาssกตาราง facebook_user </caption>";

         

         /*$money = \Input::get('money');
         $helf = \Input::get('time');
         $phographer = album::where('fullprice','>=',"$money")->get();*/

         /*$phographer = album::select('*');*/
         $money = \Input::get('money');
         $helf = \Input::get('time');
         $helf1 = \Input::get('time2');
        $date = \Input::get('date');
















        if($helf=="1"){

            session::put('data', \Input::get('date'));
            if($helf1==1) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('morning')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }
            else if($helf1==2) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('afternoon')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }
            else if($helf1==3) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('evening')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }

            $id = [];
            foreach ($date as $d) {
                $id[] = $d->user_id;
            }

            $user = User::whereNotIn('id', $id)
                ->where('halfprice', '<=', $money)
                ->select('id', 'name','fullprice','halfprice','phonenumber','website')
                ->get();
            
        }else if ($helf=="2") {

            session::put('data', \Input::get('date'));
            if($helf1==1) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('morning')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }
            else if($helf1==2) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('afternoon')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }
            else if($helf1==3) {
                $date = Calendar::
                where('start', '>=', session()->get('data'))
                    ->where('end', '<=', session()->get('data'))
                    ->orwhere(function ($query) {
                        $query->where('start', '<=', session()->get('data'))
                            ->where('end', '>=', session()->get('data'));

                    })
                    ->whereNotNull('evening')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
            }

            $id = [];
            foreach ($date as $d) {
                $id[] = $d->user_id;
            }

            $user = User::whereNotIn('id', $id)
                ->where('fullprice', '<=', $money)
                ->select('id', 'name','fullprice','halfprice','phonenumber','website')
                ->get();
            
        }

        
       

        
        return view('showsearch')->with('photo',$user);


       
       
        //return redirect('/showsearch');


         /*foreach ($phographer as $phographers) {

             echo "<tr>";
             echo "<td>ไอดี $phographers->id;</td>
               <td>ครึ่งวัน $phographers->fullprice;</td>
               <td>เต็มวัน $phographers->halfprice;</td>
               <td>$phographers->email;</td>
               ";
             echo "</tr>";

         }
         echo "</table>";

       }*/

}
}
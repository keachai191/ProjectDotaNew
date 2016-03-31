<?php

namespace App\Http\Controllers;

use App\Models\Album as Album ;
use App\Models\Photographer;
use DB;


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
            
              $users = DB::table('users')
            /*->join('albums', 'users.id', '=', 'albums.photographer_id')*/
            ->where('halfprice','<=',$money)
                  ->orderBy('halfprice', 'asc')
            ->get();      
            
        }else if ($helf=="2") {
            
              $users = DB::table('users')
           /* ->join('albums', 'users.id', '=', 'albums.photographer_id')*/
            ->where('fullprice','<=',$money)
                  ->orderBy('fullprice', 'asc')
            ->get();  
            
        }

        
       

        
        return view('showsearch')->with('photo',$users);


       
       
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
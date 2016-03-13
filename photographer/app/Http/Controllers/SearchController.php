<?php

namespace App\Http\Controllers;

use App\Models\Photographer as Photographer ;


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

         echo "<table><caption>ข้อมูลจากตาราง facebook_user </caption>";

         $phographer = Photographer::all();
         foreach ($phographer as $phographers) {

             echo "<tr>";
             echo "<td> $phographers->id;</td>
               <td>$phographers->name;</td>
               <td>$phographers->website;</td>
               <td>$phographers->email;</td>
               <td>$phographers->addres;</td>
               <td>$phographers->phonenumber;</td>";
             echo "</tr>";

         }
         echo "</table>";

       }

}

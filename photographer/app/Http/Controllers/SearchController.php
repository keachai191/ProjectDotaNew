<?php
namespace App\Http\Controllers;
use App\Models\Album as Album ;
use App\Models\Photographer;
use App\Models\Calendar;
use App\Models\Request;
use App\Models\Review;
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
        $name = \Input::get('name');
        if($money != ""){
        if($name = $name){
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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('name','like','%'.$name.'%')
                        ->where('halfprice','<=',$money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->where('name_user','like','%'.$name.'%')
                            ->whereNotNull('morning')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }

                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();
                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }

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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('name','like','%'.$name.'%')
                        ->where('halfprice','<=',$money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->where('name_user','like','%'.$name.'%')
                            ->whereNotNull('afternoon')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }

                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();
                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }
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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('name','like','%'.$name.'%')
                        ->where('halfprice','<=',$money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->where('name_user','like','%'.$name.'%')
                            ->whereNotNull('evening')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }

                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();
                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }
                }


            }else if ($helf=="2") {
                session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '>=', session()->get('data'))
                        ->where('end', '<=', session()->get('data'))
                        ->orwhere(function ($query) {
                            $query->where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'));
                        })
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();


                $id = [];
                foreach ($date as $d) {
                    $id[] = $d->user_id;
                }
                $user = User::whereNotIn('id', $id)
                    ->where('name','like','%'.$name.'%')
                    ->where('fullprice','<=',$money)
                    ->orderBy('fullprice', 'ASC')
                    ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                    ->get();



                $idUser = [];
                foreach ($user as $user) {
                    $idUser[] = $user->id;
                }

                $finalID = [];
                foreach($idUser as $idUser){
                    $requests = Request::
                    where('user_id','=',$idUser)
                        ->where('checkreques','=',3)
                        ->where('start','=',session()->get('data'))
                        ->where('name_user','like','%'.$name.'%')
                        ->get();
                    if(count($requests) == 0){
                        $finalID[] = $idUser;
                    }
                }

                $user = User::whereIn('id', $finalID)
                    ->orderBy('halfprice', 'ASC')
                    ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                    ->get();
                $like = Review::whereIn('user_id', $finalID)

                    ->orderBy('like', 'ASC')
                    ->select('id', 'name_user','like','user_id','name_facebook')
                    ->get();

                $getData = [];


                foreach ($user as $userGet) {
                    $userGet['countLike'] = [];

                    foreach ($like as $likeGet) {
                        if ($likeGet->user_id == $userGet->id) {
                            $userGet['countLike'] = $likeGet;
                        }
                    }
                    $getData[] = $userGet;

                }






            }}

        if($name == ''){
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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('halfprice', '<=', $money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->whereNotNull('morning')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }

                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }
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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('halfprice', '<=', $money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->whereNotNull('afternoon')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }




                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }
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
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->where('halfprice', '<=', $money)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->whereNotNull('evening')
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }




                    $user = User::whereIn('id', $finalID)
                        ->orderBy('halfprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }
                }
            }





            else if ($helf=="2") {
                session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '>=', session()->get('data'))
                        ->where('end', '<=', session()->get('data'))
                        ->orwhere(function ($query) {
                            $query->where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'));
                        })
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();




                $id = [];
                foreach ($date as $d) {
                    $id[] = $d->user_id;
                }
                $user = User::whereNotIn('id', $id)
                    ->where('fullprice', '<=', $money)
                    ->orderBy('fullprice', 'ASC')
                    ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                    ->get();

                $idUser = [];
                foreach ($user as $user) {
                    $idUser[] = $user->id;
                }

                $finalID = [];
                foreach($idUser as $idUser){
                    $requests = Request::
                    where('user_id','=',$idUser)
                        ->where('checkreques','=',3)
                        ->where('start','=',session()->get('data'))
                        ->get();
                    if(count($requests) == 0){
                        $finalID[] = $idUser;
                    }
                }


                $user = User::whereIn('id', $finalID)
                    ->orderBy('fullprice', 'ASC')
                    ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                    ->get();

                $like = Review::whereIn('user_id', $finalID)

                    ->orderBy('like', 'ASC')
                    ->select('id', 'name_user','like','user_id','name_facebook')
                    ->get();

                $getData = [];


                foreach ($user as $userGet) {   // นำ card ใส่ status
                    $userGet['countLike'] = [];

                    foreach ($like as $likeGet) {
                        if ($likeGet->user_id == $userGet->id) {
                            $userGet['countLike'] = $likeGet;
                        }
                    }
                    $getData[] = $userGet;

                }



            }}}







        if($money == ""){
            if($name = $name){
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->where('name','like','%'.$name.'%')
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->where('name_user','like','%'.$name.'%')
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }

                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }
                    }


                }else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                        $date = Calendar::
                        where('start', '>=', session()->get('data'))
                            ->where('end', '<=', session()->get('data'))
                            ->orwhere(function ($query) {
                                $query->where('start', '<=', session()->get('data'))
                                    ->where('end', '>=', session()->get('data'));
                            })
                            ->select('user_id')
                            ->groupBy('user_id')
                            ->get();
                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->Where('name','like','%'.$name.'%')
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }


                    $user = User::whereIn('id', $finalID)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $like = Review::whereIn('user_id', $finalID)

                        ->orderBy('like', 'ASC')
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();

                    $getData = [];


                    foreach ($user as $userGet) {   // นำ card ใส่ status
                        $userGet['countLike'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['countLike'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }

                }}

            if($name == ''){
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('morning')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('afternoon')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }
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
                        $id = [];
                        foreach ($date as $d) {
                            $id[] = $d->user_id;
                        }
                        $user = User::whereNotIn('id', $id)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();



                        $idUser = [];
                        foreach ($user as $user) {
                            $idUser[] = $user->id;
                        }

                        $finalID = [];
                        foreach($idUser as $idUser){
                            $requests = Request::
                            where('user_id','=',$idUser)
                                ->where('checkreques','=',3)
                                ->where('start','=',session()->get('data'))
                                ->whereNotNull('evening')
                                ->get();
                            if(count($requests) == 0){
                                $finalID[] = $idUser;
                            }
                        }




                        $user = User::whereIn('id', $finalID)
                            ->orderBy('halfprice', 'ASC')
                            ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                            ->get();

                        $like = Review::whereIn('user_id', $finalID)

                            ->orderBy('like', 'ASC')
                            ->select('id', 'name_user','like','user_id','name_facebook')
                            ->get();

                        $getData = [];


                        foreach ($user as $userGet) {   // นำ card ใส่ status
                            $userGet['countLike'] = [];

                            foreach ($like as $likeGet) {
                                if ($likeGet->user_id == $userGet->id) {
                                    $userGet['countLike'] = $likeGet;
                                }
                            }
                            $getData[] = $userGet;

                        }


                    }
                }






                else if ($helf=="2") {
                    session::put('data', \Input::get('date'));

                    $date = Calendar::
                    where('start', '>=', session()->get('data'))
                        ->where('end', '<=', session()->get('data'))
                        ->orwhere(function ($query) {
                            $query->where('start', '<=', session()->get('data'))
                                ->where('end', '>=', session()->get('data'));
                        })

                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get();




                    $id = [];
                    foreach ($date as $d) {
                        $id[] = $d->user_id;
                    }
                    $user = User::whereNotIn('id', $id)
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();

                    $idUser = [];
                    foreach ($user as $user) {
                        $idUser[] = $user->id;
                    }

                    $finalID = [];
                    foreach($idUser as $idUser){
                        $requests = Request::
                        where('user_id','=',$idUser)
                            ->where('checkreques','=',3)
                            ->where('start','=',session()->get('data'))
                            ->get();
                        if(count($requests) == 0){
                            $finalID[] = $idUser;
                        }
                    }


                    $user = User::whereIn('id', $finalID)  //เอาค่าจากตาราง User ออกมา
                        ->orderBy('fullprice', 'ASC')
                        ->select('id', 'name','fullprice','halfprice','phonenumber','website','image')
                        ->get();



                    $like = Review::whereIn('user_id', $finalID) //เอาาค่าจากตาราง Review ออกมา
                        ->select('id', 'name_user','like','user_id','name_facebook')
                        ->get();





                    $getData = [];


                    foreach ($user as $userGet) {
                        $userGet['count'] = [];

                        foreach ($like as $likeGet) {
                            if ($likeGet->user_id == $userGet->id) {
                                $userGet['count'] = $likeGet;
                            }
                        }
                        $getData[] = $userGet;

                    }




                }}}








        return view('showsearch')->with('photo',$getData)
            ->with('money',$money)
            ->with('helf',$helf)
            ->with('helf1',$helf1)
            ->with('date',\Input::get('date'));


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
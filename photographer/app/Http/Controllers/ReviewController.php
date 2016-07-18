<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function getReview()
    {


        $profiles = DB::table('users')
            ->where('users.name', '=', session()->get('UserName'))
            ->get();


        $FacebookID = DB::table('users_facebook')
            ->where('users_facebook.name', '=', session()->get('FacebookName'))
            ->get();


        $like = \Input::get('like');
        $detail = \Input::get('detail');
        $name_facebook = \Input::get('name_facebook');

        $new_check =  Review::where('facebook_id','=',$FacebookID[0]->id)
            ->where('name_user','=',session()->get('UserName'))
            ->get();

        if(count($new_check) != 0)
        {abort(404);}

        $new_request = new Review();

        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));
        $new_request->created_at =date_format($date, 'Y-m-d H:i:s');
        $new_request->updated_at =date_format($date, 'Y-m-d H:i:s');



        $new_request->like = $like;
        $new_request->detail = $detail;
        $new_request->facebook_id = $FacebookID[0]->id;
        $new_request->facebook_email = session()->get('FacebookEmail');
        $new_request->name_facebook = $name_facebook;
        $new_request->name_user = session()->get('UserName');
        $new_request->user_id = $profiles[0]->id;



        $new_request->save();


        return redirect('/ShowProfile'.session()->get('UserName'));
    }
    public function getReviewCheck($username , $userphoto)
    {

        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));


        $profiles = DB::table('requests')
            ->where('requests.name_facebook', '=',$username )
            ->where('requests.name_user', '=',$userphoto )
            ->where('requests.checkreques', '=',3 )
            ->get();




        $profiles2 = DB::table('review')
            ->where('review.name_facebook', '=',$username )
            ->where('review.name_user', '=',$userphoto )
            ->get();




        if($profiles == null){
            abort(403);}

        if (count($profiles2) == 0) {

            foreach ($profiles as $checkprofiles) {
                if (date('Y-m-d') >= $checkprofiles->start) {
                    return redirect('/formreview' . session()->get('UserName'));
                }
            }
            abort(405);
        }

        else abort(404);


    }

    public function viewcomment()
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/

        $requests = DB::table('review')
            ->where('review.name_facebook', '=', session()->get('FacebookName'))
            ->orderBy('updated_at', 'DESC')
            ->get();


        return view('recordreview')->withRequests($requests);

    }


    public function editComment($id)
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/

        $id = \App\Models\Review::find($id);


        return view('editreview')->withId($id);


    }

    public function updateComment($id)
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/



        $detail = \Input::get('detail');
        $like = \Input::get('like');


        $user = Review::find($id);
        $user->detail = $detail;
        $user->like = $like;
        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));
        $user->created_at =date_format($date, 'Y-m-d H:i:s');
        $user->updated_at =date_format($date, 'Y-m-d H:i:s');



        $user->save();
        return redirect('viewcomment');


    }

    public function updatecommnet(Request $request, $id)
    {

        $replycomment = $request->input('replycomment');

        $newcomment = \App\Models\Review::find($id);

        $newcomment->replycomment = $replycomment;
        $date = date_create(date('Y-m-d H:i:sP'), timezone_open('asia/bangkok'));
        date_timezone_set($date, timezone_open('asia/bangkok'));
        $newcomment->created_at =date_format($date, 'Y-m-d H:i:s');
        $newcomment->updated_at =date_format($date, 'Y-m-d H:i:s');

        $newcomment->save();

        return redirect('/replycomment');

    }

    public function destroyComment($id)
    {
        /*  $data = DB::table('users')
              ->join('requests', 'users.id', '=', 'requests.user_id')
              ->where('requests.user_id','=', session()->get('FacebookEmail'))
              ->get();
            return $data;*/

        Review::destroy($id);
        return redirect('viewcomment');


    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Album as Album ;
use App\Models\Photographer;
use App\Models\Calendar;
use App\Models\Review;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;
class ReviewController extends Controller
{
    public function getReview()

    {
        $addData = new Review();
        $addData->like = \Input::get('like');
        //$addData->unlike = \Input::get('unlike');
        $addData->detail = \Input::get('detail');

        $addData->save();
        echo "successsss";
    }
}

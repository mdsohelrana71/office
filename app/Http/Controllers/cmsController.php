<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use PDF;
use Carbon\Carbon;
use Auth;

class cmsController extends Controller
{
    public function CMS(){
        return View('front.home.home');
    }
    public function work(){
        return View('front.home.work');
    }
    public function addWork(Request $request){
        $addWork = DB::table('work')->insert([
            'user_id'      =>Auth::user()->id,
            'today_work'   => $request->today_work,
            'nextday_work' => $request->nextday_work,
        ]);
        return redirect()->route('work_view');
    }
    public function workView(){
        $date = \Carbon\Carbon::today()->subDays(1);
        $completeDate = \Carbon\Carbon::today()->subDays(0);
        $tomorrowWorks = DB::table('work')
                                ->where('created_at', '>=', $date)
                                ->where('user_id', Auth::user()->id )
                                ->get();
        $completeDatas = DB::table('work')
                                ->where('created_at', '>=', $completeDate)
                                ->where('user_id', Auth::user()->id )
                                ->get();
        return View('front.home.work_view')->with(compact('tomorrowWorks','completeDatas'));
    }
}

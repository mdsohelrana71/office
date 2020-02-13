<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= DB::table('member')->get();

        $costs=DB::table('costs')->sum('cost');
        if(Auth::user()->id <= 2){
            return View('admin.home.home')->with(compact('datas','costs'));
        }else {
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

}

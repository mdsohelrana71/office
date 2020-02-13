<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use PDF;
use Auth;
class AdminController extends Controller{


    public function addMemberPage(Request $request){
        if(Auth::user()->id <= '2'){
            return view('admin.account.add_member');
        }else {
            return view('admin.login.login');
        }
    }
    public function addMember(Request $request){
        DB::table('member')->insert([
            'name' => $request->name
        ]);
        if(Auth::user()->id <= '2'){
            return redirect()->route('/home')->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
        
    }

    public function AddMeal(Request $request){
        DB::table('member_meals')->insert([
            'meal' => $request->meal,
            'member_id' => $request->member_id,
            'type' => 'meal'
        ]);
        if(Auth::user()->id <= '2'){
            return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }

    public function Addtakas(Request $request){
        DB::table('member_meals')->insert([
            'taka' => $request->taka,
            'member_id' => $request->member_id,
            'type' => 'taka'
        ]);
        if(Auth::user()->id <= '2'){
            return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }


    public function edit($id){
        $results = DB::table('member_meals')->where('id', $id)->first();
        if(Auth::user()->id <= '2'){
            return view('admin.account.edit')->with(compact('results'));
        }else {
            return view('admin.login.login');
        }
    }

    public function update(Request $request, $id){
        $member=DB::table('member_meals')->where('id',$id)->first();
        DB::table('member_meals')->where('id',$id)->update([
            'meal'=>$request->meal,
            'taka'=>$request->taka
        ]);
        //return back()->with('success','Successfully Edit');
        if(Auth::user()->id <= '2'){
            return redirect()->route('member_details',$member->member_id)->with('success', 'Edit Successfully!!');
        }else {
            return view('admin.login.login');
        }
    }

    public function deleteColum($id){
        $member=DB::table('member_meals')->where('id',$id)->first();
        DB::table('member_meals')->where('id',$id)->delete();
        if(Auth::user()->id <= '2'){
            return back()->with('message','Successfully Delete');
        }else {
            return view('admin.login.login');
        }
    }

    public function delete($id){
        DB::table('member')->where('id',$id)->delete();
        if(Auth::user()->id <= '2'){
            return redirect()->route('/')->with('message','Successfully Delete');
        }else {
            return view('admin.login.login');
        }
    }


    public function memberDetails($id){  
        $query= DB::table('member_meals')->where('member_id',$id);
        
                if(request()->select !=null){
                    $query->where('type',request()->select);
                }if (request()->date !=null) {
                    $query->whereDate('created_at',request()->date." 00:00:00");
                }

                $results=$query->get();
        $data=DB::table('member')->where('id',$id)->first();
        if(Auth::user()->id <= '2'){
            return view('admin.account.member_details')->with(compact('results','data','id'));
        }else {
            return view('admin.login.login');
        }
    }

    public function costList(){
        $costs=DB::table('costs')->orderBy('created_at','ASC')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.account.bajar_list')->with(compact('costs'));
        }else {
            return view('admin.login.login');
        }
    }

    public function costAdd(){
        if(Auth::user()->id <= '2'){
            return view('admin.account.bajar_list_add');
        }else {
            return view('admin.login.login');
        }
    }


    public function newAddCost(Request $request){
        DB::table('costs')->insert([
            'cost'=> $request->cost
        ]);
        return redirect()->route('cost_list')->with('message','Successfully Done');
    }

    public function addSnackView(){
        if(Auth::user()->id <= '2'){
            return view('admin.account.add_snack');
        }else {
            return view('admin.login.login');
        }
    }
    public function addSnackCost(Request $request){
        DB::table('snack_costs')->insert([
            'snack_cost'=> $request->snack_cost
        ]);
        return redirect()->route('snack_cost_list');
    }
    public function snackCostList(){
        $snackCosts=DB::table('snack_costs')->orderBy('created_at','ASC')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.account.snack_cost_list')->with(compact('snackCosts'));
        }else {
            return view('admin.login.login');
        }
    }
    
    public function mealRate(){


        $datas= DB::table('member')->get();
        $total_meal =DB::table('member_meals')->whereNull('taka')->sum('meal');
        $total_food_cost  =DB::table('costs')->sum('cost');
        $total_snack_cost  =DB::table('snack_costs')->sum('snack_cost');
        $totalCost = $total_food_cost + $total_snack_cost ;
        $main_meal_rate = round($totalCost / $total_meal);

        if(Auth::user()->id <= '2'){
            return view('admin.account.meal_rate',compact('datas','main_meal_rate','total_snack_cost'));
        }else {
            return view('admin.login.login');
        }
    }

    public function othersCcosts(Request $request){
        DB::table('others_costs')->insert([
            'others_costs'=> $request->others_costs
        ]);
        return redirect()->route('/')->with('message','Successfully Done');

    }

    public function othersCostList (){
        $othersCostLists=DB::table('others_costs')->orderBy('created_at','ASC')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.account.others_cost_list')->with(compact('othersCostLists'));
        }else {
            return view('admin.login.login');
        }

    }

    public function memberPrint(Request $request, $id){  
        $query= DB::table('member_meals')->where('member_id',$id);
        
            if(request()->select !=null){
                $query->where('type',request()->select);
            }if (request()->date !=null) {
                $query->whereDate('created_at',request()->date." 00:00:00");
            }

            $results=$query->get();
        $data=DB::table('member')->where('id',$id)->first();
        if(Auth::user()->id <= '2'){
            return view('admin.account.member_print')->with(compact('results','data','id'));
        }else {
            return view('admin.login.login');
        }
    }

    public function totalCost(){
        $salarys         = DB::table('employees')->where('status',1)->get()->sum('salary');
        $othersTotalCost = DB::table('others_costs')->get()->sum('others_costs'); 
        $foodTotalTkaka  = DB::table('costs')->get()->sum('cost');
        $snackTotalTkaka  = DB::table('snack_costs')->get()->sum('snack_cost');
        if(Auth::user()->id <= '2'){
            return view('admin.account.total_cost')->with(compact('othersTotalCost','foodTotalTkaka','salarys','snackTotalTkaka'));
        }else {
            return view('admin.login.login');
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use PDF;
use Carbon\Carbon;
use Auth;

class OfficeController extends Controller{
    public function office(){
    	$datas= DB::table('employees')->where('status', '1')->get();
        if(Auth::user()->id <= '2'){
    	   return View('admin.office.office')->with(compact('datas'));
        }else {
            return view('admin.login.login');
        }
    }

    public function addEmployee(){
        $employees_categorys = DB::table('employees_category')->get();
        $teams = DB::table('projects')->get();
        if(Auth::user()->id <= '2'){
    	   return view('admin.office.add_employee')->with(compact('employees_categorys','teams'));
        }else {
            return view('admin.login.login');
        }
    }

    public function newAddEmployee(Request $request){
    	DB::table('employees')->insert([
    		'name'                      => $request->name,
    		'number'                    => $request->number,
            'number2'                   => $request->number2,
            'family_number'             => $request->family_number,
            'address'                   => $request->address,
            'permanent_address'         => $request->permanent_address,
            'blood_group'               => $request->blood_group,
            'last_blood_donation_date'  => $request->last_blood_donation_date,
            'salary'                    => $request->salary,
            'join_date'                 => $request->join_date,
            'category'                  => $request->category,
            'team'                      => $request->project_name,
            'status'                    => $request->status,
            'salary_status'             => $request->salary_status,
    	]);
        if(Auth::user()->id <= '2'){
    	       return redirect()->route('office')->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }

    public function addIntime(Request $request){
    	DB::table('attendance')->insert([
    		'intime'      => $request->intime,
            'off_reason'  => $request->off_reason,
            'absent'      => $request->absent,
    		'date'        => $request->date,
    		'employee_id' => $request->employee_id
    	]);
        if(Auth::user()->id <= '2'){
    	    return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }

    public function addOutTime(Request $request){
    	DB::table('attendance')
            ->where('date',$request->date)
            ->where('employee_id',$request->employee_id)
            ->update([
    		'outtime' => $request->outtime
    	]);
        if(Auth::user()->id <= '2'){
    	   return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }
    public function employeeEdit($id){
        $singleData          = DB::table('employees')->where('id',$id)->first();
        $employees_categorys = DB::table('employees_category')->get();
        $teams = DB::table('projects')->get();
        
        if(Auth::user()->id <= '2'){
            return View('admin.office.employee_edit')->with(compact('singleData','employees_categorys','teams'));
        }else {
            return view('admin.login.login');
        }
    }
    public function employeeUpdate(Request $request, $id){
        DB::table('employees')->where('id',$id)->update([
            'name'                      => $request->name,
    		'number'                    => $request->number,
            'number2'                   => $request->number2,
            'family_number'             => $request->family_number,
            'address'                   => $request->address,
            'permanent_address'         => $request->permanent_address,
            'blood_group'               => $request->blood_group,
            'last_blood_donation_date'  => $request->last_blood_donation_date,
            'salary'                    => $request->salary,
            'join_date'                 => $request->join_date,
            'category'                  => $request->category,
            'team'                      => $request->project_name,
            'status'                    => $request->status,
            'salary_status'             => $request->salary_status,
            'bonus'                     => $request->bonus,
        ]);
        
        if(Auth::user()->id <= '2'){
            return redirect()->route('office')->with('success', 'Edit Successfully!!');
        }else {
            return view('admin.login.login');
        }
    }
    
    public function employeeDetails($id){ 
    	$details  = DB::table('attendance')->where('employee_id', $id)->orderBy('date','ASC')->get();
        $countDay = DB::table('attendance')->where('employee_id', $id)->whereNotNull('intime')->count('id');
        $totalAbsentdays = DB::table('attendance')->where('employee_id', $id)->where('absent','1')->count('id');
        $totalLatetdays = DB::table('attendance')->where('employee_id', $id)->where('intime','>=','10:06:00')->count('id');
    	$data=DB::table('employees')->where('id',$id)->first();
        if(Auth::user()->id <= '2'){
    	   return view('admin.office.employee_details')->with(compact('details','data','countDay','totalAbsentdays','totalLatetdays'));
        }else {
            return view('admin.login.login');
        }
    }

    public function editEmployee($id){  
    	$results = DB::table('attendance')->where('id', $id)->first();
        if(Auth::user()->id <= '2'){
    	   return view('admin.office.edit')->with(compact('results'));
        }else {
            return view('admin.login.login');
        }
    }

    public function updateEmployee(Request $request, $id){
    	$employee=DB::table('attendance')->where('id',$id)->first();
        DB::table('attendance')->where('id',$id)->update([
        	'intime'    =>$request->intime,
        	'outtime'   =>$request->outtime,
            'off_reason'=>$request->off_reason,
            'absent'    =>$request->absent,
        	'date'      =>$request->date,
    	]);

        if(Auth::user()->id <= '2'){
            return redirect()->route('employee_details',$employee->employee_id)->with('success', 'Edit Successfully!!');
        }else {
            return view('admin.login.login');
        }
    }

    public function employeePresent(){
        $date = \Carbon\Carbon::today()->subDays(0);
        $allAttendances = DB::table('employees')
                        ->join('attendance', 'employees.id', '=', 'attendance.employee_id')
                        ->where('date', '>=', $date)->orderBy('intime','ASC')
                        ->get();
        if(Auth::user()->id <= '2'){
            return view('admin.office.employee_present')->with(compact('allAttendances'));
        }else {
            return view('admin.login.login');
        }

    }
    public function addEmployeeCategoryPage(){
        if(Auth::user()->id <= '2'){
            return view('admin.office.employees_category');
        }else {
            return view('admin.login.login');
        }
    }
    public function addNewEmployeeCategory(Request $request){
        $addNewEmployeeCategory = DB::table('employees_category')->insert([
            'title'      => $request->title,
        ]);
        if(Auth::user()->id <= '2'){
            return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }
    public function salary(Request $request){
        $salary = DB::table('employees')->where('status', '1')
                                        ->whereMonth('salary_status','!=',date('m'))
                                        ->whereNotNull('salary');
                                        if($request->input('select')){
                                            $salary = DB::table('employees')->where('team', $request->input('select'));
                                    }
        $salarys = $salary->get();
        $projects = DB::table('projects')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.office.salary')->with(compact('salarys','projects'));
        }else {
            return view('admin.login.login');
        }
    }
    public function salaryInactive($id){
        $salaryInactive = DB::table('employees')->where('id',$id)->update([
            'salary_status'      => date('Y-m-d'),
        ]);
        if(Auth::user()->id <= '2'){
            return back()->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }

    public function project(){
        $employees = DB::table('employees')->get();
        $projects = DB::table('projects')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.office.projects')->with(compact('employees','projects'));
        }else {
            return view('admin.login.login');
        }
    }
    public function addProject(Request $request){
        $project = DB::table('projects')->insert([
            'project_name' => $request->project_name,
            'leader'    => $request->leader,
        ]);
        if(Auth::user()->id <= '2'){
            return redirect()->route('project');
        }else {
            return view('admin.login.login');
        }
    }
    public function projectEdit($id){
        $projectEdits = DB::table('projects')->where('id',$id)->first();
        $leaders = DB::table('employees')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.office.edit_project')->with(compact('projectEdits','leaders'));
        }else {
            return view('admin.login.login');
        }
    }
    // public function project_details($id){
    //     $team_member = DB::table('employees')->where('id', $id )->first();
    //     $team_member = DB::table('employees')->where('team'== $team_member->team )->get();
    //     dd($team_member);
    //     return View('office.edit_team')->with(compact('projectEdit','leaders'));
    // }

     public function todayTask(){
        $date = \Carbon\Carbon::today()->subDays(1);
        $todayTasks = DB::table('users')
                                ->join('work', 'users.id', '=', 'work.user_id')
                                ->where('work.created_at', '>=', $date)
                                ->get();
        $users = DB::table('users')->whereNotIn('id',[1,2])->get();
        return View('admin.office.today_task')->with(compact('todayTasks','users'));
    }
    
    public function taskDetails($id){
        $TaskDetails = DB::table('users')
                                        ->join('work', 'work.user_id', '=', 'users.id')
                                        ->where('user_id',$id)->get();
        $user = DB::table('users')->where('id',$id)->first();                           
        return View('admin.office.task_details')->with(compact('TaskDetails','user'));
    }
    public function members(){
        $members = DB::table('members')->get();
        return View('admin.office.members')->with(compact('members'));
    }
    public function addMembers(){
        return View('admin.office.add_members');
    }
    public function newAddMembers(Request $request){
        $addNewMembers = DB::table('members')->insert([
            'name'      => $request->name,
        ]);
        if(Auth::user()->id <= '2'){
            return redirect()->route('members')->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }
    public function teams(){
        $projectMembers = DB::table('project_member')
                                                    ->join('projects', 'project_member.projects_id' ,'=', 'projects.id')
                                                    ->join('members', 'project_member.members_id' ,'=', 'members.id')
                                                    ->orderBy('project_name', 'asc')
                                                    ->get();
        if(Auth::user()->id <= '2'){
            return View('admin.office.teams',compact('projectMembers'));
        }else {
            return view('admin.login.login');
        }
    }
    public function addProjectMember(){
        $projects = DB::table('projects')->orderBy('project_name', 'asc')->get();
        $members  = DB::table('members')->get();
        if(Auth::user()->id <= '2'){
            return View('admin.office.add_project_members')->with(compact('members','projects'));
        }else {
            return view('admin.login.login');
        }
    }
    public function addNewProjectMember(Request $request){
    //     $this->validate($request,[
    // 		'projects_id'     => 'required|unique:posts',
    // 		'members_id'      => 'required|unique:posts',
    // 	]);

        $addNewTeam = DB::table('project_member')->insert([
            'projects_id' => $request->project_id,
            'members_id'  => $request->member_id,
        ]);
        
        if(Auth::user()->id <= '2'){
            return redirect()->route('teams')->with('message','Successfully Done');
        }else {
            return view('admin.login.login');
        }
    }
}

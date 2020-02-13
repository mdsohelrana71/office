@extends('front.master')
@section('title')
Task Page
@endsection
@section('content')
    <ul class="nav bg-dark" id="menu">
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('office') }}">Home</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('add_employee_category_page') }}">Category</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('employee_present') }}">present</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('salary') }}">Salary</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('project') }}">Projects</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('today_task') }}">Task</a>
      </li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 my-4">
                <div class="dropdown">
                  <span><button id="btn" style="width:200px;height:35px;border-radius: .0rem;" type="button" class="btn btn-primary">Select Employee</button></span>
                  <div class="dropdown-content">
                    @foreach ($users as $user)
                        <a class="dropdown-item" href="{{ route('task_details',['id'=>$user->id]) }}">{{ $user->name }}</a>
                    @endforeach
                  </div>
                </div>
            </div>
            <div class="col-md-10 my-3">
                <h4 class="text-center" style="color: #d4a60b;">Task List <a href="{{ route('work') }}"><i style="color: #fff;font-size: 25px" class="fa fa-plus-square" aria-hidden="true"></i></a><i class="text-cente fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></h4>
                <div class="task">
                    @foreach ($todayTasks as $todayTask)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-todo-input-wrap">
                                    <p class="text-center">{{ date('d-M-Y', strtotime($todayTask->created_at))}}</p>
                                    <p class="text-center"><a href="{{ route('task_details',['id'=>$todayTask->user_id]) }}">{{ $todayTask->name }}</a></p>
                                <div class="main-todo-input fl-wrap todo-listing">
                                    <ul id="list-items"><i class="fa fa-check-square" aria-hidden="true"></i>{{ $todayTask->today_work }}</ul>
                                    <ul id="list-items"><i class="fa fa-file" aria-hidden="true"></i> {{ $todayTask->nextday_work }}</ul>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 
@endsection
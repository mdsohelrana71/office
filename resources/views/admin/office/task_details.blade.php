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
        <a style="color:#fff;" class="nav-link" href="{{ route('project') }}">Project</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('today_task') }}">Task</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="">Task Details</a>
      </li>
    </ul>
<div>
<div class="col-md-8 offset-md-2 my-3">
  <h4 class="text-center" style="color: #d4a60b;">Task List <i class="text-cente fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></h4>
  <div class="task">
    
 <p class="text-center" style="font-size: 25px;color:#459632"><strong>{{ $user->name}}</strong></p>
    @foreach ($TaskDetails as $TaskDetail)
    <div class="row">
      <div class="col-md-12">
        <div class="main-todo-input-wrap">
          <p class="text-center">{{ date('d-M-Y', strtotime($TaskDetail->created_at))}}</p>
          <div class="main-todo-input fl-wrap todo-listing">
          <ul id="list-items">{{ $TaskDetail->today_work }}</ul>
        <ul id="list-items">{{ $TaskDetail->nextday_work }}</ul>
      </div>
    </div>
  </div>
</div>
@endforeach

</div>
</div>
@endsection
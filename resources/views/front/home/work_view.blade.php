@extends('front.master')
@section('title')
Task Page
@endsection
@section('content')
 <ul class="nav bg-dark" id="menu">
      <li class="nav-item">
        <a style="color:#fff;" class="nav-link" href="{{ route('/') }}">Home</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('work_view') }}">Task</a>
      </li>
    </ul>
<div>
  <div class="col-md-8 offset-md-2 my-3">
    <h4 class="text-center" style="color: #d4a60b;">Task List <a href="{{ route('work') }}"><i style=" color: #fff;font-size: 25px" class="fa fa-plus-square" aria-hidden="true"></i></a><i class="text-cente fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></h4>
    <div class="task">
        @foreach ($tomorrowWorks as $tomorrowWork)
            <div class="row">
                <div class="col-md-12">
                    <div class="main-todo-input-wrap">
                        <p class="text-center">{{ date('d-M-Y', strtotime($tomorrowWork->created_at))}}</p>
                        <div class="main-todo-input fl-wrap todo-listing">
                            <ul id="list-items"><i class="fa fa-check-square" aria-hidden="true"></i>{{ $tomorrowWork->today_work }}</ul>
                            <ul id="list-items"><i class="fa fa-file" aria-hidden="true"></i>{{ $tomorrowWork->nextday_work }}</ul>
                        </div>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
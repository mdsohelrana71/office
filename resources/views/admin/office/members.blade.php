@extends('admin.master')

@section('title')

  Members

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
        <a style="color:#fff;" class="nav-link" href="{{ route('today_task') }}">Task</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('members') }}">Member</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('teams') }}">Teams</a>
      </li>
    </ul>
    <div>
      <div class="col-md-8 offset-md-2 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Members List <a href="{{ route('add_members') }}"><i style="color: #fff;font-size: 25px" class="fa fa-plus-square" aria-hidden="true"></i></a> <i class="text-cente fa fa-download" id ="printIcon" onclick="allEmployee()" aria-hidden="true"></i> </h4>
        <div id="message">
          @if(session('message'))
          <br><b class="alert alert-info">{{session('message')}}</b><br><br>
          @endif
        </div>
        
        <table class="table table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>
              <th style="color:#d4a60b">NO</th>
              <th style="color:#d4a60b">Member Name</th>
              <th style="color:#d4a60b">Action</th>
            </tr>
          </thead>
          <tbody>
            @php($a=1)
            @foreach($members as $member)
                <tr>
                  <td>{{ $a++ }}</td>
                  <td>{{ $member->name }}</td>
                  <td>
                      <a class="btn btn-primary btn-xs"  href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
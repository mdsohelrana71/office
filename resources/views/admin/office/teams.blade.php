@extends('admin.master')

@section('title')

  Teams

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
        <a style="color:#fff;" class="nav-link" href="{{ route('members') }}">Member</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('teams') }}">Teams</a>
      </li>
    </ul>
    <div>
      <div class="col-md-10 offset-md-1 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Team List <a href="{{ route('add_project_member') }}"><i style="color: #fff;font-size: 25px" class="fa fa-plus-square" aria-hidden="true"></i></a></h4>
        <div id="message">
          @if(session('message'))
          <br><b class="alert alert-info">{{session('message')}}</b><br><br>
          @endif
        </div>
        
        <table class="table table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>  
              <th style="color:#d4a60b">NO</th>
              <th style="color:#d4a60b">Project Name</th>
              <th style="color:#d4a60b">Employee Name</th>
            </tr>
          </thead>
          <tbody>
            @php($a=1)
            
            @foreach($projectMembers as $projectMember)  
            <tr>
              <td>{{ $a++ }}</td>
              <td>{{ $projectMember->project_name }}</td>
              <td>{{ $projectMember->name }}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
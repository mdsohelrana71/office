@extends('admin.master')

@section('title')

  Present List

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
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('employee_present') }}">present</a>
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
    </ul>
    <div>
      <div class="col-md-8 offset-2 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Today Present List <i class="text-cente fa fa-download" id ="btn" onclick="presentPrint()" aria-hidden="true"></i></h4>
        <div id="message">
          @if(session('message'))
          <br><b class="alert alert-info">{{session('message')}}</b><br><br>
          @endif
        </div>
        
        <table class="table table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>
              <th style="color:#d4a60b">NO</th>
              <th style="color:#d4a60b">Employee Name</th>
              <th style="color:#d4a60b">In Time</th>
              <th style="color:#d4a60b">Out Time</th>
              <th style="color:#d4a60b">Off / late Reason</th>
              <th style="color:#d4a60b">Absent</th>
              <th style="color:#d4a60b">Date</th>
            </tr>
          </thead>
          <tbody>
            @php($a=1)
            @foreach($allAttendances as $allAttendance)
            <tr>
              @if($allAttendance->intime <= '10:05:00')
              <td>{{ $a++ }}</td>
              @else
              <td style="color: red;">{{ $a++ }}</td>
              @endif
              <td>{{ $allAttendance->name }}</td>
              <td>{{ $allAttendance->intime }}</td>
              <td>{{ $allAttendance->outtime }}</td>
              <td>{{ $allAttendance->off_reason }}</td>
              @if($allAttendance->absent == 1)
                <td>Absent</td> 
              @else   
                <td></td>
              @endif
              <td>{{ $allAttendance->date }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

@endsection

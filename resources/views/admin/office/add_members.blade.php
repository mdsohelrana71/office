@extends('admin.master')

@section('title')

  Office Management

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
        <a style="color:#fff;" class="nav-link" href="{{ route('project') }}">Team</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('today_task') }}">Task</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('members') }}">Member</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('add_members') }}">Add Member</a>
      </li>
    </ul>
    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add New Member</h4>

      	<form action="{{ route('new_add_members')}}" method="post">
      		{{ csrf_field() }}
	        <div class="form-group">
	          <label for="exampleInputPassword1">Member Name</label>
	          <input type="text" name="name" class="form-control"placeholder="Member Name">
	        </div>
	        <button type="submit" class="btn btn-success">Submit</button>
	    </form>
    </div>
@endsection
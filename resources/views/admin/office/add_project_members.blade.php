@extends('admin.master')

@section('title')

  add team member

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
        <a style="color:#fff;" class="nav-link" href="{{ route('add_members') }}">Add Member</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('teams') }}">Teams</a>
      </li>
    </ul>
    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add Team Member</h4>

      	<form action="{{ route('add_new_project_member')}}" method="post">
      		{{ csrf_field() }}
	        <div class="form-group">
                <label for="exampleInputPassword1">Project</label>
                <select class="form-control" name="project_id">
                  <option value="" hidden >Select Project</option>
                  @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Member</label>
                <select class="form-control" name="member_id">
                  <option value="" hidden >Select Member</option>
                  @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                  @endforeach
                </select>
            </div>
	        <button type="submit" class="btn btn-success">Submit</button>
	    </form>
    </div>
@endsection
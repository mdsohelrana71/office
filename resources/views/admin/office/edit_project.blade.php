@extends('admin.master')

@section('title')

  Team Edit

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
</ul>
<div>
  <div class="col-md-6 offset-md-3 my-3">
    <h4 class="text-center" style="color: #d4a60b;">Team Edit</h4>
    <form action="" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleInputPassword1">Team Name</label>
        <input type="text" name="project_name" class="form-control" value="{{ $projectEdits->project_name}}">
      </div>
      <div class="form-group">
        <select class="form-control" name="leader">
          <option>{{ $projectEdits->leader }}</option>
          @foreach($leaders as $leader)
            <option value="{{ $projectEdits->leader }}">{{ $leader->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</div>
</div>
@endsection
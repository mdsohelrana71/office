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
    <a style="color:#d4a60b;" class="nav-link" href="{{ route('project') }}">Projects</a>
  </li>
</ul>
<div>
  <div class="col-md-6 offset-md-3 my-3">
    <h4 class="text-center" style="color: #d4a60b;">Teams List
      <a id="team" onclick="intime(this.id,name)">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
      </a>
      <i class="text-cente fa fa-download" id ="printIcon" onclick="allEmployee()" aria-hidden="true"></i>
    </h4>
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
          <th style="color:#d4a60b">project Leader</th>
          <th style="color:#d4a60b">Action</th>
        </tr>
      </thead>
      <tbody>
        @php($a=1)
        @foreach($projects as $project)
        <tr>
          <td>{{ $a++ }}</td>
          <td>{{ $project->project_name }}</td>
          <td>{{ $project->leader }}</td>
          <td>
            <a class="btn btn-primary btn-xs"  href="{{ route('project_edit',['id'=>$project->id]) }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <!-- <a class="btn btn-secondary btn-xs" href="{{ route('project_details',['id'=>$project->id]) }}">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
            </a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="intime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add In Time</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center" style="color:#d4a60b;"></h5>
        <form action="{{ route('add_project')}}" method="post">
          {{ csrf_field() }}
          <?php
          date_default_timezone_set("Asia/Dhaka");
          $time = date("h:i");
          ?>
          <div class="form-group">
            <label for="exampleInputPassword1">Team Name</label>
            <input type="text" name="project_name" class="form-control" required>
          </div>
          <div class="form-group">
            <select class="form-control" name="leader">
              <option value="">Select Team Leader</option>
              @foreach($employees as $employee)
                <option value="{{ $employee->name }}">{{ $employee->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function intime(id) {
$('#intime').modal('show');
$('form #employee_id').val(id);
}
</script>
</body>
</html>
@endsection
@extends('admin.master')

@section('title')

  Salary

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
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('salary') }}">Salary</a>
      </li>
    </ul>
    <div>
      <div class="col-md-8 offset-md-2 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Salary List<i class="text-cente fa fa-download" id ="btn" onclick="salarys()" aria-hidden="true"></i></h4>
        <div id="message">
          @if(session('message'))
          <br><b class="alert alert-info">{{session('message')}}</b><br><br>
          @endif
        </div>
        <form>
          <div class="form-row">
            <div class="form-group col-md-4">
              <select name="select" class="form-control" onchange="this.form.submit();">
                <option value="" hidden>Select Projects</option>
                @foreach ($projects as $project)
                    <option value="{{$project->project_name}}" {{request()->select== 'DRM'?'selected':''}}>{{$project->project_name}}</option>
                @endforeach
                
              </select>
            </div>
          </div>
        </form>
        <div class="col-md-2">
         <a class="btn btn-info" href="{{ route('salary') }}">Refresh</a>
        </div><br>
        <table class="table salary table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>
              <th style="color:#d4a60b">NO</th>
              <th style="color:#d4a60b">Employee Name</th>
              <th style="color:#d4a60b">Salary</th>
              <th style="color:#d4a60b">Action</th>
            </tr>
          </thead>
          <tbody>
            @php($a=1)
            @foreach($salarys as $salary)
            <tr>
              <td>{{ $a++ }}</td>
              <td>{{ $salary->name }}</td>
              <td>{{ $salary->salary }}</td>
              <td>
                <a href="{{ route('salary_inactive',$salary->id) }}" class="btn btn-success btn-xs"><i class="fa fa-user-times" aria-hidden="true"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tr style="background: #1761a0">
            <td colspan="2" style="padding-left: 500px">Total Salary= </td>
            <td>{{ $salarys->sum('salary') }}</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
@endsection
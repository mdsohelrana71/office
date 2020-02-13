@extends('admin.master')

@section('title')

  Office Management

@endsection


@section('content')
    <ul class="nav bg-dark" id="menu">
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('office') }}">Home</a>
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
        <a style="color:#fff;" class="nav-link" href="{{ route('teams') }}">Teams</a>
      </li>
    </ul>
    <div>
      <div class="col-md-12 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Employee List <a id="addEmployee" class="btn btn-primary pull-right" href="{{route('add_employee')}}">+ Add Employee</a><i class="text-cente fa fa-download" id ="printIcon" onclick="allEmployee()" aria-hidden="true"></i> </h4>
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
              <th style="color:#d4a60b">Number One</th>
              <th style="color:#d4a60b">Family Number</th>
              <th style="color:#d4a60b">Present Address</th>
              <th style="color:#d4a60b">Permanent Address</th>
              <th style="color:#d4a60b">Blood Group</th>
              <th style="color:#d4a60b">Brithday</th>
              <th style="color:#d4a60b">Join Date</th>
              <th style="color:#d4a60b">Category</th>
              <th style="color:#d4a60b">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $date = date("m-d"); ?>
            @php($a=1)
            @foreach($datas as $data)
            <tr>
              <td>{{ $a++ }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->number }}</td>
              <td>{{ $data->family_number }}</td>
              <td>{{ $data->address }}</td>
              <td>{{ $data->permanent_address }}</td>
              <td>{{ $data->blood_group }}</td>
              @if(date('m-d', strtotime($data->brithday)) == $date)
                <td style="background:url(https://www.sru.edu//images/news/2019/June/062719a-Inline.jpg);position: relative; background-size:cover;text-align:center">{{ $data->brithday }}</td>
              @else
                <td>{{ $data->brithday }}</td>
              @endif
              <td>{{ $data->join_date }}</td>
              <td>{{ $data->category }}</td>
              <td>
                <a class="btn btn-success btn-xs" id="{{$data->id,$data->name}}" onclick="intime(this.id,name)"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                <a class="btn btn-info btn-xs" id="{{$data->id}}" onclick="outtime(this.id)"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <a class="btn btn-primary btn-xs"  href="{{ route('employee_edit',['id'=>$data->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="btn btn-secondary btn-xs" href="{{ route('employee_details',['id'=>$data->id]) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <!--<tr style="background: #1761a0">-->
          <!--  <td colspan="7" style="padding-left: 852px">Total Salary=</td>-->
          <!--  <td>{{ $datas->sum('salary') }}</td>-->
          <!--  <td colspan="4"></td>-->
          <!--</tr>-->
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
            <h5 class="text-center" style="color:#d4a60b;">{{ $data->name }}</h5>
            <form action="{{ route('add_intime')}}" method="post">
              {{ csrf_field() }}
              <?php
              date_default_timezone_set("Asia/Dhaka");
              $time = date("h:i");
              ?>
              <div class="form-group">
                <label for="exampleInputPassword1">In Time</label>
                <input type="time" name="intime" class="form-control" value="{{$time}}">
                <input type="hidden" name="employee_id" id="employee_id">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Late Reason</label>
                <textarea type="text" name="off_reason" class="form-control" ></textarea>
              </div>
              <div class="form-group">
                <select class="form-control" name="absent">
                  <option value="">Select Absent</option>
                  <option value="1">Absent</option>
                </select>
              </div>
              <?php $date = date("Y-m-d"); ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Date</label>
                <input type="date" name="date" class="form-control" value="{{$date}}" required>
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
    <div class="modal fade" id="outtime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Out Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('add_outtime')}}" method="post">
              {{ csrf_field() }}
              <?php
              date_default_timezone_set("Asia/Dhaka");
              $time = date("h:i");
              ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Out Time</label>
                <input type="time" name="outtime" class="form-control" value="{{$time}}" required>
                <input type="hidden" name="employee_id" id="employee_id">
              </div>
              <?php $date = date("Y-m-d"); ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Date</label>
                <input type="date" name="date" class="form-control" value="{{$date}}" required>
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
    function outtime(id) {
    $('#outtime').modal('show');
    $('form #employee_id').val(id);
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#message").click(function(){
    $(this).text(' ');
    });
    });
    </script>
    <script>
      function allEmployee() {
        document.getElementById("printIcon").style.visibility   = "hidden";
        document.getElementById("menu").style.visibility        = "hidden";
        document.getElementById("addEmployee").style.visibility = "hidden";
        window.print();
      }
    </script>
  </body>
</html>
@endsection
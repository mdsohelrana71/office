@extends('admin.master')

@section('title')

  Details

@endsection


@section('content')
<div id="body">
  <ul class="nav bg-dark" id="menu">
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Home</a>
  </li>
  <li class="nav-item">
    <a style="color: #d4a60b;" class="nav-link" href="#">Details</a>
  </li>
</ul>
<div class="container-fluid my-2">
  <div class="row">
    <div class="col-md-2 salary" style="font-size: 12px; margin-top: 121px;">
      <table class="table table-striped table-dark table-bordered">
        <tr>
          @php $Salary = $data->salary @endphp
          <th>Month Salary</th>
          <td>{{ $data->salary }}</td>
        </tr>
        <tr>
          @php $bonus = $data->bonus @endphp
          <th>Performance Bonus</th>
          <td>{{ $data->bonus }}</td>
        </tr>
        <tr>
          @php $oneDaySalary = $data->salary / 30 @endphp
          <th>Day Salary</th>
          <td>{{ round($oneDaySalary)}}</td>
        </tr>
        <tr>
          <th>Total Absent Day</th>
          <td>{{ $totalAbsentdays }}</td>
        </tr>
        <tr>
          @php $totalAbsentFines = $totalAbsentdays * $oneDaySalary @endphp
          <th>Total Absent Fine</th>
          <td>{{ round($totalAbsentFines) }}</td>
        </tr>
        <tr>
          <th>Total late day</th>
          <td>{{ $totalLatetdays }}</td>
        </tr>
        <tr>
          @php $oneDaylateFine = $oneDaySalary / 3 @endphp
          <th>Day Late Fine</th>
          <td>{{ round($oneDaylateFine) }}</td>
        </tr>
        <tr>
          @php $totalLateFines = $oneDaylateFine * $totalLatetdays @endphp
          <th>Total Late Fine</th>
          <td>{{ round($totalLateFines) }}</td>
        </tr>
        <tr>
          @php $totalFine = $totalLateFines + $totalAbsentFines @endphp
          <th>Total Fine</th>
          <td>{{ round($totalFine) }}</td>
        </tr>
        <tr>
          @php $totalSalary = $Salary + $bonus @endphp
          @php $finalSalary = $totalSalary - $totalFine @endphp
          <th>Final Salary = </th>
          <td>{{ round($finalSalary) }} Tk</td>
        </tr>
      </table>
    </div>
    <div class="col-md-10 text-center">
      <div style="margin-left: -140px">
        <img src="{{ URL::to('/') }}/image/logo.png" height="50px;">
      </div>
      <h2 class="" style="color: #0b9cd4;">{{$data->name}}<i class="text-cente fa fa-download" id ="printIcon" onclick="employeeDetailsPrint()" aria-hidden="true"></i>
      <select  style="font-size: 20px; background-color:#01a057;border-color:#01a057;color: #fff;" aria-label="Books nad Snippets">
        <option value="1">Active</option>
        <option value="0">In Active</option>
      </select>
      </h2><br>
      <div>
        @if(session('success'))
        <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
        <table class="table table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>
              <th style="color:#d4a60b">No</th>
              <th style="color:#d4a60b">In time</th>
              <th style="color:#d4a60b">Out time</th>
              <th style="color:#d4a60b">Off / Late Reason</th>
              <th style="color:#d4a60b">Absent</th>
              <th style="color:#d4a60b">Active Hours</th>
              <th style="color:#d4a60b">Date</th>
              <th style="color:#d4a60b">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $totalActiveHour = 0;
            $all = 0;
            $a = 1;
            @endphp
            @foreach($details as $detail)
            <tr>
              <td>{{ $a++ }}</td>
              @if($detail->intime <= '10:05:00')
              <td>{{ $detail->intime }}</td>
              @else
              <td style="color: #bd2f2f;font-weight: 1000; font-size: 16px;">{{ $detail->intime }}</td>
              @endif
              <td>{{ $detail->outtime }}</td>
              @php
              $active_hours = (float)$detail->outtime - (float)$detail->intime;
              $totalActiveHour = $totalActiveHour + $active_hours;
              @endphp
              <td>{{ $detail->off_reason }}</td>
              
              @if($detail->absent == 1)
              <td>Absent</td>
              @else
              <td></td>
              @endif
              <td>{{ $active_hours }}</td>
              <td>{{ $detail->date }}</td>
              <td>
                <a class="btn btn-success" href="{{ route('edit_employee',$detail->id) }}">Edit</a>
                <!-- <a class="btn btn-danger" href="{{ route('delete_colum',$detail->id) }}" onclick="dele();">Delete</a> -->
              </td>
            </tr>
            @endforeach
            @php
            
            $AverageActiveTime = $totalActiveHour / $countDay ;
            @endphp
          </tbody>
          <tbody>
            <td colspan="8">Month Active Average {{round($AverageActiveTime,3)}}</td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<script>
function employeeDetailsPrint() {
document.getElementById("printIcon").style.visibility   = "hidden";
document.getElementById("menu").style.visibility        = "hidden";
document.getElementById("body").style.backgroundColor  = "white";
window.print();
}
</script>
@endsection
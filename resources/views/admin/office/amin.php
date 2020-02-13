<!DOCTYPE html>
<html lang="en">
<head>
  <title>Member Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ URL::to('/') }}/image/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background: #0b5345;">

    <ul class="nav bg-dark">
      <li class="nav-item">
        <a href="{{ route('/') }}"><img src="{{ URL::to('/') }}/image/logo.png" height="50px;"></a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;padding-left: 425px;" class="nav-link" href="{{ route('/') }}">Home</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Employee List</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="#">Details</a>
      </li>
    </ul>

    <div class="col-md-10 offset-md-1 my-5">
      <div class="text-center">
          <img src="{{ URL::to('/') }}/image/logo.png" height="50px;">
      </div>
      <h2 class="text-center" style="color: #0b9cd4;">{{$data->name}}
        <a href="{{ route('print',['id'=>$data->id]) }}" name="btn" class="btn btn-info ml-2">Data Print</a>
      </h2>

      <div class="col-md-8" style="margin-left: 175px;">
        @if(session('success'))
          <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
        <table class="table table-striped table-dark table-bordered text-center table-hover">
          <thead>
            <tr>
              <th style="color:#d4a60b">In time</th>
              <th style="color:#d4a60b">Out time</th>
              <th style="color:#d4a60b">Active Hours</th>
              <th style="color:#d4a60b">Date</th>
              <th style="color:#d4a60b">Action</th>
            </tr>
          </thead>
          <tbody>
            @php 
              $totalActiveHour = 0;
              $all = 0;
              $minute = 0;
            @endphp

          @foreach($details as $detail)
            @php
              
              preg_match("/([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $detail->outtime, $match1);
              preg_match("/([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $detail->intime, $match2);

              $out1 = $match1[1];
              $out2 = $match1[2];
              $in1  = $match2[1];
              $in2  = $match2[2];

              $time = abs($out1 - $in1)*60 + abs($out2 - $in2);
              $hour = (int)($time/60);
              if($time%60 != 0)
                $min = $time%60;

            @endphp
            <tr>
              
                @if($detail->intime <= '10:05:00')
                    <td>{{ $detail->intime }}</td>
                  @else
                    <td style="color: #bd2f2f;">{{ $detail->intime }}</td>
                @endif
              <td>{{ $detail->outtime }}</td>

                  @php
                    $active_hours = $hour;
                    $minute += $min; 
                    $totalActiveHour = $totalActiveHour + $active_hours;
                  @endphp

              <td>{{ $hour }} : @if($min>0){{ $min }} @endif</td>
              <td>{{ $detail->date }}</td>
              <td>
                <a class="btn btn-success" href="{{ route('edit_employee',$detail->id) }}">Edit</a>
                <!-- <a class="btn btn-danger" href="{{ route('delete_colum',$detail->id) }}" onclick="dele();">Delete</a> -->
              </td>
            </tr>
          @endforeach

          @php 
            $mtoh = $minute/60;
            $AverageActiveTime = ($totalActiveHour+$mtoh) / $countDay ;
          @endphp
          </tbody>
          <tbody>
            
            
            <td colspan="5">Month Active Average {{ round($AverageActiveTime, 2) }}</td>
          </tbody>
        </table>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
  function dele() {
    alert("Are you sure you want to delete this item?");
  }
</script
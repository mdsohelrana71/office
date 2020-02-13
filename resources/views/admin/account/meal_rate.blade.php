@extends('admin.master')

@section('title')

  Meal Rate

@endsection


@section('content')

    <ul class="nav bg-dark">
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('/home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('cost_add') }}">Add Food Cost</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('cost_list') }}">Food Cost List</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('others_cost_list') }}">Others Cost List</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="{{ route('meal_rate') }}">Meal Rate</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('total_cost') }}">Total Cost</a>
      </li>
    </ul>

    <div class="col-md-10 offset-md-1 my-5">
      <h4 class="text-center" style="color: #d4a60b;">Meal Rate list</h4>

      @if(session('message'))
        <br><b class="alert alert-info">{{session('message')}}</b><br><br>
      @endif
      <table class="table table-striped table-dark table-bordered text-center table-hover">
          <tr>
            <th>Current Meal Rate</th>
            <th style="color:  #00af28;">{{$main_meal_rate}}</th>
          </tr>
          <tr>
            <th>Name</th>
            <th>Total Meal</th>
            <th>Total Taka</th>
            <th>Total Meal Cost Amount</th>
            <!-- <th>Total Others Cost Amount</th> -->
            <th>Due Or Submission</th>
          </tr>
        <tbody>

        @foreach($datas as $data)

        @php
          
          $total_meal     =DB::table('member_meals')->where('member_id',$data->id)->whereNull('taka')->sum('meal');
          $totalOtherCost =DB::table('others_costs')->get()->sum('others_costs');
          $total_taka =DB::table('member_meals')->where('member_id',$data->id)->whereNull('meal')->sum('taka');
          $totalMealCost        =$total_meal * $main_meal_rate;
          $totalCosst = $totalOtherCost + $totalMealCost;
          
        @endphp
          <tr>
            <td>{{ $data->name }}    </td>
            <td>{{ $total_meal}}     </td>
            <td>{{ $total_taka }}    </td>
            <td>{{ $totalMealCost }} </td>
            <!-- <td>{{ $totalOtherCost }} </td> -->
            <td>{{ $total_taka-$totalMealCost}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add meal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('add_meal')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">meal</label>
            <input type="number" name="meal" class="form-control" placeholder="meal" required>
            <input type="hidden" name="member_id" id="member_id">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="takaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Taka</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('add_taka')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">Taka</label>
            <input type="number" name="taka" class="form-control" placeholder="taka" required>
            <input type="hidden" name="member_id" id="member_id">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
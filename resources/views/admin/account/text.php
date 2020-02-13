@extends('admin.master')

@section('title')

  Dashboard

@endsection


@section('content')
<ul class="nav bg-dark">
  <li class="nav-item active">
    <a style="color:#d4a60b;margin-left:50px;" class="nav-link" href="{{ route('/home') }}">Home</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('cost_add') }}">Add Food Cost</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('add_snack_view') }}">Add Snack Cost</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('cost_list') }}">Food Cost List</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('snack_cost_list') }}">Snack Cost List</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('others_cost_list') }}">Others Cost List</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('meal_rate') }}">Meal Rate</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('total_cost') }}">Total Cost</a>
  </li>
  <div style="margin-left: 50px;">
    <li class="nav-item">
      <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Office System</a>
    </li>
  </div>
</ul>
<div class="col-md-8 offset-md-2 my-5">
  <h4 class="text-center" style="color: #0b9cd4;">All Cost Account<a class="btn btn-success pull-right" href="{{action('homeController@addMemberPage')}}">+ Add Member</a></h4>
  <div id="message">
    @if(session('message'))
    <br><b class="alert alert-info">{{session('message')}}</b><br><br>
    @endif
  </div>
  
  <table class="table table-striped table-dark table-bordered text-center table-hover">
    <thead>
      <tr>
        <th style="color:#d4a60b">Name</th>
        <th style="color:#d4a60b">Total Meal</th>
        <!-- <th style="color:#d4a60b">Others Cost</th> -->
        <th style="color:#d4a60b">Total Taka</th>
        <th style="color:#d4a60b">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
      $meal=0;
      $amount=0;
      @endphp
      @foreach($datas as $data)
      @php
      $otherscosts=DB::table('others_costs')->sum('others_costs');
      $personalotalMeal  = DB::table('member_meals')->where('member_id',$data->id)->whereNull('taka')->sum('meal');
      $totalTaka         = DB::table('member_meals')->where('member_id',$data->id)->whereNull('meal')->sum('taka');
      $meal+=$personalotalMeal;
      $amount+=$totalTaka;
      
      @endphp
      <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $personalotalMeal }}</td>
        <td>{{ $totalTaka }}</td>
        <td>
          <a class="btn btn-primary" id="{{$data->id}}" onclick="display(this.id)">Add Meal</a>
          <a class="btn btn-info" id="{{$data->id}}" onclick="othersCcosts(this.id)">Add Others Cost</a>
          <a class="btn btn-success" id="{{$data->id}}" onclick="taka(this.id)">Add Taka</a>
          <a class="btn btn-secondary" href="{{ route('member_details',['id'=>$data->id]) }}">Details</a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tr>
      <th>Total</th>
      <th>{{$meal}}</th>
    </tr>
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
<div class="modal fade" id="otherscosts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Others Costs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('add_others_costs')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">Others Costs</label>
            <input type="number" name="others_costs" class="form-control" placeholder="Others Costs" required>
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
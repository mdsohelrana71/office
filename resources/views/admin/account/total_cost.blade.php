@extends('admin.master')

@section('title')

  Total Cost

@endsection


@section('content')
    <ul class="nav bg-dark" id="menu">
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
        <a style="color: #fff;" class="nav-link" href="{{ route('meal_rate') }}">Meal Rate</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="{{ route('total_cost') }}">Total Cost</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-3">
	    <div class="text-center">
	        <img src="{{ URL::to('/') }}/image/logo.png" height="50px;">
	    </div>
	    <h4 class="text-center" style="color: #d4a60b;">Office Total Cost<i class="text-cente fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></h4>
        <table class="table table-striped table-dark table-bordered text-center table-hover">
            <thead>
              <tr>
                <th>Total Salary</th>
                <td>{{ $salarys }} Tk</td>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Total Food Cost</th>
                <td>{{$foodTotalTkaka}} Tk</td>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Total Snack Cost</th>
                <td>{{$snackTotalTkaka}} Tk</td>
              </tr>
            </thead>
              <tr>
                <th>Total Others Cost</th>
                <td>{{$othersTotalCost}} Tk</td>
              </tr>
              @php
                $totalCost = $othersTotalCost + $foodTotalTkaka + $salarys ;
              @endphp
              <tr id="account" style="background: #1761a0">
                <td>Office total Cost</td>
                <td> = {{$totalCost}} Tk</td>
              </tr>
        </table>
    </div>

@endsection

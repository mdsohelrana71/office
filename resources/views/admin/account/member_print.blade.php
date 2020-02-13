@extends('admin.master')

@section('title')

  Print

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
        <a style="color: #fff;" class="nav-link" href="{{ route('total_cost') }}">Total Cost</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="#">Print</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
      <div class="text-center">
          <img src="{{ URL::to('/') }}/image/logo.png" height="50px;">
      </div>
      <h2 id="name" class="text-center" style="color: #0b9cd4;">{{$data->name}}
        <span><i class="fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></span>
      </h2>
      <div class="col-md-8">
        @if(session('success'))
        <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
      </div><br>

      <table class="table table-striped table-dark table-bordered text-center table-hover">
        <thead>
          <tr>
            <th style="color:#d4a60b">Meal list</th>
            <th style="color:#d4a60b">Taka list</th>
            <th style="color:#d4a60b">Created At</th>
          </tr>
        </thead>
        <tbody>
          @php
            $total_meal =DB::table('member_meals')->where('member_id',$data->id)->whereNull('taka')->sum('meal');
            $total_taka =DB::table('member_meals')->where('member_id',$data->id)->whereNull('meal')->sum('taka');
          @endphp
        @foreach($results as $result)
          <tr>
            <td>{{ $result->meal }}</td>
            <td>{{ $result->taka }}</td>
            <td>{{ $result->created_at }}</td>
          </tr>
        @endforeach
          <tr>
            <td>Total Meal = {{ $total_meal }}</td>
            <td>Total Credit Taka = {{ $total_taka }}৳</td>
          </tr>
        </tbody>
      </table>
    </div>

@endsection


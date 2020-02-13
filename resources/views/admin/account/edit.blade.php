@extends('admin.master')

@section('title')

  Edit

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
        <a style="color: #fff;" class="nav-link" href="{{ route('meal_rate') }}">Meal Rate</a>
      </li>
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('total_cost') }}">Total Cost</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #0b9cd4;">Edit Information</h4>
       @if(session('success'))
        <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
        <form action="{{ route('update',$results->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b">Meal</label>
            <input type="number" name="meal" class="form-control" value="{{ $results->meal }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b">Taka</label>
            <input type="number" name="taka" class="form-control" value="{{ $results->taka }}">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>


@endsection

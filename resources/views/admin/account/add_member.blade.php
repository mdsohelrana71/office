@extends('admin.master')

@section('title')

  Add Member

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
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="#">Add Member</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add New Member</h4>

      	<form action="{{ route('new_add_member')}}" method="post">
      		{{ csrf_field() }}
	        <div class="form-group">
	          <label for="exampleInputPassword1">Member Name</label>
	          <input type="text" name="name" class="form-control"placeholder="Name">
	        </div>
	        <button type="submit" class="btn btn-success">Submit</button>
	    </form>
    </div>


@endsection

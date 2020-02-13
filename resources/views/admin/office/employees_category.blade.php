@extends('admin.master')

@section('title')

  Add Category

@endsection


@section('content')
    <ul class="nav bg-dark">
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('office') }}">Home</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('office') }}">Category</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('employee_present') }}">present</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add Category</h4>

        <form action="{{ route('add_employee_category')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <input type="text" name="title" class="form-control"placeholder="Enter Your Category">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>


@endsection
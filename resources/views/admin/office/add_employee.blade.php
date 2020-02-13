@extends('admin.master')

@section('title')

  Add Employee

@endsection


@section('content')
    <ul class="nav bg-dark">
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Office</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="#">Add Employee</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add Employee</h4>

      	<form action="{{ route('new_add_employee')}}" method="post">
      		{{ csrf_field() }}
	        <div class="form-group">
	          <label for="exampleInputPassword1">Employee Name</label>
	          <input type="text" name="name" class="form-control"placeholder="Employee Name">
	        </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mobile Number</label>
            <input type="number" name="number" class="form-control"placeholder="Phone Number"><br>
            <input type="number" name="number2" class="form-control"placeholder="Phone Number two">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Family Number</label>
            <input type="number" name="family_number" class="form-control" placeholder="Family Number">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Present Address</label>
            <textarea type="text" name="address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Permanent Address</label>
            <textarea type="text" name="permanent_address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Blood Group</label>
            <input type="text" name="blood_group" class="form-control" placeholder="Blood_group">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last blood donation date</label>
            <input type="date" name="last_blood_donation_date" class="form-control" placeholder="Blood_group">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Salary</label>
            <input type="text" name="salary" class="form-control" placeholder="Employee salary">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Join Date</label>
            <input type="date" name="join_date" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Employee category</label>
            <select class="form-control" name="category">
              <option value="" hidden >Select Employee category</option>
              @foreach ($employees_categorys as $employees_category)
                <option value="{{ $employees_category->title }}">{{ $employees_category->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Team</label>
            <select class="form-control" name="project_name">
              <option value="" hidden >Select Team</option>
              @foreach ($teams as $team)
                <option value="1">{{ $team->project_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Active</label>
            <select class="form-control" name="status">
              <option value="1" hidden>Select</option>
                <option value="1">Active</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Salary Status</label>
            <input type="date" name="salary_status" class="form-control">
          </div>
	        <button type="submit" class="btn btn-success">Submit</button>
	    </form>
    </div>


@endsection

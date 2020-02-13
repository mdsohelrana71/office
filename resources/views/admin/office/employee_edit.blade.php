@extends('admin.master')

@section('title')

  Edit

@endsection


@section('content')

    <ul class="nav bg-dark">
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Home</a>
      </li>
      <li class="nav-item">
        <a style="color: #d4a60b;" class="nav-link" href="#">Edit Employee</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #d4a60b;">Add Employee</h4>

        <form action="{{ route('employee_update',['id'=>$singleData->id]) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">Employee Name</label>
            <input type="text" name="name" class="form-control" value="{{ $singleData->name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mobile Number</label>
            <input type="number" name="number" class="form-control" value="{{ $singleData->number }}"><br>
            <input type="number" name="number2" class="form-control" value="{{ $singleData->number2 }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Family Number</label>
            <input type="number" name="family_number" class="form-control" value="{{ $singleData->family_number }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Present Address</label>
            <textarea type="text" name="address" class="form-control">{{ $singleData->address }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Permanent Address</label>
            <textarea type="text" name="permanent_address" class="form-control">{{ $singleData->permanent_address }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Blood Group</label>
            <input type="text" name="blood_group" class="form-control" value="{{ $singleData->blood_group }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last blood donation date</label>
            <input type="date" name="last_blood_donation_date" class="form-control" value="{{ $singleData->last_blood_donation_date }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Salary</label>
            <input type="text" name="salary" class="form-control" value="{{ $singleData->salary }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Join Date</label>
            <input type="date" name="join_date" class="form-control"  value="{{ $singleData->join_date }}">
          </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Category</label>
            <select class="form-control" name="category">
              <option hidden>{{ $singleData->category }}</option>
              @foreach ($employees_categorys as $employees_category)
                <option value="{{ $employees_category->title }}">{{ $employees_category->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Team</label>
            <select class="form-control" name="project_name">
              <option hidden>{{ $singleData->team }}</option>
              @foreach ($teams as $team)
                <option value="{{ $team->project_name }}">{{ $team->project_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Active and Inactive</label>
            <select class="form-control" name="status">
                <option value="1">Select</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Salary Status</label>
            <input type="date" name="salary_status" class="form-control"  value="{{ $singleData->salary_status }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Bouns</label>
            <input type="number" name="bonus" class="form-control"  value="{{ $singleData->bonus }}">
          </div>
          <button type="submit" class="btn btn-success">Update</button>
      </form>
    </div>


@endsection

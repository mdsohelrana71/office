@extends('admin.master')

@section('title')

  Edit Information

@endsection


@section('content')

    <ul class="nav bg-dark">
      <li class="nav-item">
        <a style="color: #fff;" class="nav-link" href="{{ route('office') }}">Home</a>
      </li>
      <li class="nav-item active">
        <a style="color:#d4a60b;" class="nav-link" href="{{ route('/') }}">Edit</a>
      </li>
      
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
       <h4 class="text-center" style="color: #0b9cd4;">Edit Information</h4>
       @if(session('success'))
        <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
        <form action="{{ route('update_employee',$results->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b;">Intime</label>
            <input type="time" name="intime" class="form-control" value="{{ $results->intime }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b;">OutTime</label>
            <input type="time" name="outtime" class="form-control" value="{{ $results->outtime }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b;">Off / Late Reason</label>
            <input type="text" name="off_reason" class="form-control" value="{{ $results->off_reason }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b;">Absent</label>
            <select class="form-control" name="absent">
              <option value="">Select Absent</option>
              <option value="1"{{ $results->absent == 1 ? 'selected' : '' }}>Absent</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color:#d4a60b;">OutTime</label>
            <input type="date" name="date" class="form-control" value="{{ $results->date }}">
          </div>
          <button type="submit" class="btn btn-success">Update</button>
      </form>
    </div>

@endsection

@extends('front.master')
@section('title')
Add Task Page
@endsection
@section('content')
    <ul class="nav bg-dark" id="menu">
      <li class="nav-item">
        <a style="color:#fff;" class="nav-link" href="{{ route('/') }}">Home</a>
      </li>
      <li class="nav-item active">
        <a style="color:#fff;" class="nav-link" href="{{ route('work_view') }}">Task</a>
      </li>
      <li class="nav-item active">
            <a style="color:#d4a60b;" class="nav-link" href="{{ route('work') }}">Add Task</a>
        </li>
    </ul>
    <div>
      <div class="col-md-10 offset-md-1 my-3">
        <h4 class="text-center" style="color: #d4a60b;">Task assent</h4>
        <div id="message">
          @if(session('message'))
          <br><b class="alert alert-info">{{session('message')}}</b><br><br>
          @endif
        </div>
        <form action="{{ route('add_work')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputPassword1">Add today Complete Task</label>
            <textarea type="text" name="today_work" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Add work plan tomorrow</label>
            <textarea type="text" name="nextday_work" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
@endsection
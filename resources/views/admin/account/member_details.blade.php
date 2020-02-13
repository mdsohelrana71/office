@extends('admin.master')

@section('title')

  Details

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
        <a style="color: #d4a60b;" class="nav-link" href="#">Details</a>
      </li>
    </ul>

    <div class="col-md-8 offset-md-2 my-5">
      <h2 id="name" class="text-center" style="color: #0b9cd4;">{{$data->name}}
        <a href="{{ route('member_print',['id'=>$data->id]) }}" name="btn" class="btn btn-info ml-2">Data Print</a>
      </h2>

      <div class="col-md-8">
        @if(session('success'))
        <br><b class="alert alert-info">{{session('success')}}</b><br><br>
        @endif
        <form>
          <div class="form-row">
            <div class="form-group col-md-4">
              <select name="select" class="form-control" onchange="this.form.submit();">
                <option value="" hidden>Select One</option>
                <option value="meal" {{request()->select== 'meal'?'selected':''}}>Meal</option>
                <option value="taka" {{request()->select== 'taka'?'selected':''}}>Taka</option>
              </select>
            </div>
            <div class="form-group col-md-4">
               <input type="date" name="date" class="form-control">
            </div>

            <div class="form-group col-md-2">
               <input type="submit" value="sumbit" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-2">
         <a class="btn btn-info" href="{{ route('member_details',$id) }}">Refresh</a>
      </div><br>

      <table class="table table-striped table-dark table-bordered text-center table-hover">
        <thead>
          <tr>
            <th style="color:#d4a60b">Meal list</th>
            <th style="color:#d4a60b">Taka list</th>
            <th style="color:#d4a60b">Created At</th>
            <th style="color:#d4a60b">Action</th>

          </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
          <tr>
            <td>{{ $result->meal }}</td>
            <td>{{ $result->taka }}</td>
            <td>{{ $result->created_at }}</td>
            <td>
              <a class="btn btn-success" href="{{ route('edit',$result->id) }}">Edit</a>
              <a class="btn btn-danger" href="{{ route('delete_colum',$result->id) }}" onclick="dele();">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

@endsection


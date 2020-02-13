@extends('admin.master')

@section('title')

  Snack Cost

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
    <a style="color: #fff;" class="nav-link" href="{{ route('add_snack_view') }}">Add Snack Cost</a>
  </li>
  <li class="nav-item">
    <a style="color: #fff;" class="nav-link" href="{{ route('cost_list') }}">Food Cost List</a>
  </li>
  <li class="nav-item">
    <a style="color: #d4a60b;" class="nav-link" href="{{ route('snack_cost_list') }}">Snack Cost List</a>
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
  <div class="text-center">
    <img src="{{ URL::to('/') }}/image/logo.png" height="50px;">
  </div>
  <h4 class="text-center" style="color: #d4a60b;">Snack Cost List <i class="text-cente fa fa-download" id ="btn" onclick="costPrint()" aria-hidden="true"></i></h4>
  <table class="table table-striped table-dark table-bordered text-center table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Taka list</th>
        <th>Created At</th>
      </tr>
    </thead>
    @php($a=1)
    @foreach($snackCosts as $snackCost)
    <tr>
      <td>{{ $a++ }}</td>
      <td>{{ $snackCost->snack_cost }}</td>
      <td>{{ date('d-M-Y', strtotime($snackCost->created_at)) }}</td>
    </tr>
    @endforeach
    <tr>
      <th>TotaL Cost= </th>
      <th>{{ $snackCosts->sum('snack_cost')}} Tk</th>
    </tr>
  </table>
</div>
<script>
function costPrint() {
document.getElementById("btn").style.visibility = "hidden";
document.getElementById("menu").style.visibility = "hidden";
window.print();
}
</script>
@endsection
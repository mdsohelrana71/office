@extends('front.master')
@section('title')
Home Page
@endsection
@section('content')
    <ul class="nav bg-dark" id="menu">
		<li class="nav-item active"style="margin-left: auto;">
    	
    	    @guest
    	        <a style="color:#fff;" class="nav-link" href="{{ route('login') }}">Login <i class="fa fa-user" aria-hidden="true"></i></a>
    	    @else 
                <a style="color:#fff;" class="nav-link" href="{{ route('login') }}">Profile <i class="fa fa-user" aria-hidden="true"></i></a>
            @endguest
  	    </li>
    </ul>
    <div class="main_image">
    	<img style="width: 100%;background-size: cover;" src="image/1.jpg">
    </div>
    <div class="footer  text-center" style="margin-top: 10px; ">
    	<span style="color: #d4a60b;">Copyright © <?php $t=time(); echo(date("Y",$t)); ?> All rights reserved </span><a href="http://coderscms.com/"><i class="fa fa-globe" aria-hidden="true" style="color:#18609f; margin-left: 25px; cursor: pointer; font-size: 20px;"></i></a>
    </div>
@endsection
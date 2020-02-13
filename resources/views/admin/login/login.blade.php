<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<style type="text/css">
  .justify-content-center .card-body:before{
   content: ''; position:absolute;width:100%;height:100%;background-color: rgba(0, 0, 0, 0.75);bottom:0;left:0;
  }
</style>
<body class="bg-gradient-primary">
<ul class="nav bg-dark" id="menu">
  <li class="nav-item">
    <a href="{{ route('/') }}"><img src="{{ URL::to('/') }}/image/logo.png" height="50px;"></a>
  </li>
</ul>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background:url(image/team.jpg);position: relative;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style=""></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"></h1>
                  </div>
                  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user {{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('name') }}" name="name">
                       @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword" placeholder="Password" name="password" required>

                      @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
            
                    <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    <input type="submit"class="btn btn-primary btn-user btn-block" value="Login">
                  
                    <hr>
                    <a href="" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!--<a style="text-decoration:none;" class="btn btn-link" href="{{ route('password.request') }}">-->
                    <!--    {{ __('Forgot Your Password?') }}-->
                    <!--</a>-->
                  </div>
                  <div class="text-center">
                    <!--<a style="text-decoration:none;" class="small" href="{{ route('register') }}">Create an Account!</a>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>

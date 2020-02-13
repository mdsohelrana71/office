<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> @yield('title')</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/image/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <style type="text/css">
    body{
      box-sizing: content-box;
    }
    span{
      color: #fff;
    }
    p{
      color: #fff;
    }
    .task hr{
      background: #5d5500;
    }
    .task span{
      margin: 10px;
    }
    .task{
      margin-top: 5px;
    
    }
    
    .task i{
      width: 30px;
      height: 30px;
      background-color: #1761a0;
      border-radius: 50%;
      line-height: 30px;
      text-align: center;
    }
    .task .fa{
      font-size: 15px;
      color: #d4a60b;
      
    }
    .btn{
      line-height:1.0;
    }
    .table td{
      padding: 0.25rem;
    }
    /*.salary .table{
      width: 250px;
    }*/
    .salary .table th{
      padding: 0.25rem;
      text-align: left;
    }
    .salary .table td{
      text-align: left;
    }
    h4 i{
          color: #fff;
        padding-left: 15px;
        cursor: pointer;
      }
      h4 i:hover{
          color: yellow;
          text-decoration: none;
      }
      h2 i{
          color: #fff;
        padding-left: 15px;
        cursor: pointer;
      }
      h2 i:hover{
          color: yellow;
          text-decoration: none;
      }
      label {
        color: #fff;
    }
    .form-control{
      background-color: #272727;
      border: 1px solid #001fff;
      color: #fff;
    }
    .form-control:focus{
      color: #fff;
        background-color: #000;
    }
    .salary .btn-success:hover {
        background-color: #882121;
        border-color: #ff000c;
    }
  </style>
  <body id="body" style="background:#000000;">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow ">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button><a href="{{ route('/home') }}"><img src="{{ URL::to('/') }}/image/logo.png" height="50px;"></a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color:#000000;">
                  @if(isset(Auth::user()->name))

                  {{ Auth::user()->name }}
                  @endif
                </span>
                <img style="height: 34px;" class="img-profile rounded-circle" src="{{ URL::to('/') }}/image/user2.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>

          </ul>

        </nav>

        @yield('content')
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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

  <!-- Page level plugins -->
  <script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $("#message").click(function(){
            $(this).text(' ');
          });
        });
  </script>
  <script>
      function presentPrint() {
        document.getElementById("btn").style.visibility = "hidden";
        document.getElementById("menu").style.visibility = "hidden";
        document.getElementsByClassName(".table td");
        window.print();
      }
    </script>
    <script type="text/javascript">
        function intime(id) {
          $('#intime').modal('show');
          $('form #employee_id').val(id);
        }
        function outtime(id) {
          $('#outtime').modal('show');
          $('form #employee_id').val(id);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $("#message").click(function(){
            $(this).text(' ');
          });
        });
      </script>
      <script>
          function allEmployee() {
            document.getElementById("printIcon").style.visibility   = "hidden";
            document.getElementById("menu").style.visibility        = "hidden";
            document.getElementById("addEmployee").style.visibility = "hidden";
            window.print();
          }
    </script>
    <script>
      function myFunction() {
        document.getElementById("btn").style.visibility = "hidden";
            document.getElementById("menu").style.visibility = "hidden";
            document.getElementById("name").style.paddingLeft = "125px";
          window.print();
      }
    </script>
    <script>
          function costPrint() {
              document.getElementById("btn").style.visibility = "hidden";
            document.getElementById("menu").style.visibility = "hidden";
            window.print();
          }
      </script>
      <script type="text/javascript">
      function display(id) {
          $('#exampleModal').modal('show');
          $('form #member_id').val(id);
      }
      function othersCcosts(id) {
          $('#otherscosts').modal('show');
          $('form #member_id').val(id);
      }
      function taka(id) {
          $('#takaModal').modal('show');
          $('form #member_id').val(id);
      }

      function deleted() {
          alert("Are you sure you want to delete this item?");
      }

    </script>
    <script type="text/javascript">
          $(document).ready(function(){
            $("#message").click(function(){
                $(this).text(' ');
            });
          });
    </script>
    <script type="text/javascript">
        function display(id) {
          $('#exampleModal').modal('show');
          $('form #member_id').val(id);
        }
        function taka(id) {
          $('#takaModal').modal('show');
          $('form #member_id').val(id);
        }
    </script>
    <script>
          function costPrint() {
              document.getElementById("btn").style.visibility = "hidden";
              document.getElementById("menu").style.visibility = "hidden";
              window.print();
          }
          function dele() {
            alert("Are you sure you want to delete this item?");
          }
      </script>
    <script type="text/javascript">
        function dele() {
          alert("Are you sure you want to delete this item?");
        }
    </script>
    <script>
          function otherscostPrint() {
            document.getElementById("btn").style.visibility = "hidden";
            document.getElementById("menu").style.visibility = "hidden";
            window.print();
          }
        function dele() {
              alert("Are you sure you want to delete this item?");
        }

      </script>
      <script>
          function costPrint() {
            document.getElementById("btn").style.visibility = "hidden";
            document.getElementById("menu").style.visibility = "hidden";
            document.getElementById("account").style.background = "#1761a0";
            window.print();
        }
      </script>
      <script>
          function costPrint() {
              document.getElementById("btn").style.visibility = "hidden";
              document.getElementById("menu").style.visibility = "hidden";
            window.print();
          }
      </script>
      <script>
          function salarys() {
              document.getElementById("btn").style.visibility = "hidden";
              document.getElementById("menu").style.visibility = "hidden";
            window.print();
          }
      </script>
      <script>
      function employeeDetailsPrint() {
        document.getElementById("printIcon").style.visibility   = "hidden";
        document.getElementById("menu").style.visibility        = "hidden";
        document.getElementById("body").style.backgroundColor  = "white";
        window.print();
      }
    </script>

</body>

</html>

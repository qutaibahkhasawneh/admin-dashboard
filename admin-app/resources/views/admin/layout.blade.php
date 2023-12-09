<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">

	        <ul class="list-unstyled components mb-5" style="margin-top: 100px">

	          <li>
	              <a href="{{ url('dashboard') }}">Dashboard</a>
	          </li>
	          <li>
	              <a href="{{ url('users') }}">Users</a>
	          </li>
	          <li>
              <a href="{{ url('roles') }}">Roles</a>
	          </li>
	        </ul>

	        <div class="footer" style="margin-top: 170px">
	        	<p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart" aria-hidden="true"></i>
						  </p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" style="color: orange; font-weight: 600;" href="{{ url('logout') }}">logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        @yield('content')

        <h2 class="mb-4">@yield('heading_one')</h2>
        <h5>@yield('heading_two')</h5>

      </div>
		</div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
  </body>
</html>


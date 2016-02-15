<!DOCTYPE html>
<html ng-App="angularityApp">
<head>
	<title>Sweet Dreams Boutique - POS and Inventory </title>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome-4.5.0/css/font-awesome.min.css">
</head>
<body>

  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <a href="/" class="navbar-brand">SweeBot - POS and Inventory</a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      </div>
      <div class="navbar-collapse collapse" id="navbar-main">
        <ul class="nav navbar-nav">
         
          @if(Session::has('sessions.session_auth_token')) 
             
              <li><a href="/">Main</a></li>
              <li><a href="/products">Products</a></li>
              <li><a href="/inventory">Inventory</a></li>
              <li><a href="/products/sales">Sales</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Settings <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="download">
                  <li><a href="/settings/system-users">System Users</a></li>
                  <li><a href="#">My Account</a></li>
                 
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Hello  {{ Session::get('sessions.session_username') }} </a></li>
              <li><a href="/auth/logout">Logout</a></li>  
            </ul>
          @endif 
      </div>
    </div><!-- /container -->
  </div><!-- /navbar -->

  <div class="page-header" id="banner">
      <div class="row">
        <div class="col-md-12 ">
          <!-- <h3 align="center">Sweet Dreams Boutique POS and Inventory System</h3> -->
        </div>
       
      </div>
   </div><!-- /page-header -->

   <div class="container">
     @if(Session::has('flash_msg'))

      <div class="alert alert-success">
         {{ Session::get('flash_msg') }}
      </div>

    @endif  

   </div>

  <div class="container">

    <div class="row">
      <div class=" col-md-12 ">
      
        @yield('content')

      </div>
    </div><!-- /row -->
  </div><!-- /container -->

      
	<script type="text/javascript" src="/js/jquery-1.10.2.min.js "></script>

	<script type="text/javascript" src="/js/bootstrap.min.js "></script>

  @yield('external-scripts')
  
</body>
</html>

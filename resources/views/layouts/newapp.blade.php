<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="shortcut icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
    	.bg-img{
    		min-width: 913px;
    		max-width: 914px;
    		max-height: 300px;
    	}
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/js/json2csv.js"></script>
</head>
<body>

	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="{{ route('logout') }}" 
	  			onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" >Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                 </form>
      </li>
      <li><a href="">Edit Profile</a></li>
	  
	</ul>
	<nav class="deep-purple darken-4">
	  <div class="nav-wrapper container">
	    <a href="#!" class="brand-logo">Student Profile</a>
	    <ul class="right hide-on-med-and-down">
	      <!-- Dropdown Trigger -->
	      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">  {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a></li>
	    </ul>
	  </div>
	</nav>

	 @yield('content')


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	// $(document).ready(function(){
	// 	$(".button-collapse").sideNav('show');
	// });
</script>
</body>
</html>
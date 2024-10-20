
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
	<meta name="author" content="webThemez.com">
	<title>eLearning - Free Educational Responsive Web Template </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="favicon" href="{{ asset('images/favicon.png') }}">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="{{ asset('elerningtheme/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('elerningtheme/css/font-awesome.min.css') }}">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="{{ asset('elerningtheme/css/bootstrap-theme.css') }}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{ asset('elerningtheme/css/da-slider.css') }}" />
	<link rel="stylesheet" href="{{ asset('elerningtheme/css/style.css') }}">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="{{ asset('elerningtheme/images/logo.png') }}" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="#"><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{url('about')}}">About</a></li>
					<li><a href="{{ url('/') }}" target="courses">Courses</a></li>

					<li><a href="{{url('login')}}">Portal Login</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Courses</h1>
                </div>
            </div>
        </div>
    </header>

        <!-- /container -->
        <section id="services">
        <div class="container">
            <div class="heading">
                <!-- Heading -->
                @if($cat)
                <h2>{{$cat->faculty_name}}</h2>
                <p>{{$cat->description}}</p>
                @else
                <h2>General</h2>
                @endif

                <br/>
            </div>
            <div class="row">

            @foreach($courses as $course)

                <!-- item -->
                <div class="col-md-4 text-center">
                    <i class="fa fa-css3 fa-2x circle"></i>
                    <h3>{{$course->course_name}} </h3>
                    <p>{{$course->description}}</p>
                </div>
                <!-- end: -->
            @endforeach
              
            <nav>{{ $courses->links() }}</nav>
            </div>
        </div>
        <!--/.container-->
    </section>



  

		<footer id="footer">
		<div class="container">
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="#">Home</a> | 
								<a href="#">About</a> |
							
								<a href="{{ url('login')}}">Portal Login</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2017. Powered By <a href="http://webthemez.com/" rel="develop">Crispecol Limited</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="{{ asset('elerningtheme/js/modernizr-latest.js') }}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('elerningtheme/js/jquery.cslider.js') }}"></script>
	<script src="{{ asset('elerningtheme/js/custom.js') }}"></script>
</body>
</html>

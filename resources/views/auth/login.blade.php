{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<div class="container">
    <div class="row">
        
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>ONLINE RESOURCE CENTER | Login</title>

            <link href="spiniastuff/css/bootstrap.min.css" rel="stylesheet">
            <link href="spiniastuff/font-awesome/css/font-awesome.css" rel="stylesheet">

            <link href="spiniastuff/css/animate.css" rel="stylesheet">
            <link href="spiniastuff/css/style.css" rel="stylesheet">

        </head>

        <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>

                    <!-- <h1 class="logo-name"></h1> -->
                    <img alt="image" class="img-circle" src="elerningtheme/images/logo.png" />
                </div>
                <h3>ONLINE RESOURCE CENTRE</h3>

                <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                      <!-- <div class="form-group"> -->
                   <!--      <label>Language</label>
                        <select name="language" id="language" class="form-control" required>

                            <option value="">Select Language(Choisir la langue)</option>
                            <option value="1">English (Anglaise)</option>
                            <option value="2">French (Française)</option>
                   
                        </select> -->
                    <!-- </div> -->

                    <h4>Please Login</h4>
                    <p> NB. You can change default language at the portal after login.</p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                   
                </form>

                <a href="#"><small>Not Registered?</small></a>
                <p class="text-muted text-center"><small>Go Back Home and Enroll to a course</small></p>
                <a class="btn btn-sm btn-success btn-block" href="{{url('/')}}">Back Home</a>
                <p class="m-t"> <small>Online Resource Center  &copy; 2017</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
           <script type="text/javascript">
     $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#language").change(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: 'http://localhost/prolearn-multilanguage/public/setlang',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$("#language").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                     // alert("success");
                    }
                }); 
            });
       });    
    </script>


        </body>
    </div>
</div>

 

{{--@endsection--}}

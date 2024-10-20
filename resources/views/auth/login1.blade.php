{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<div class="container">
    <div class="row">
        {{--<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
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

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>--}}
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>INSPINIA | Login</title>

            <link href="spiniastuff/css/bootstrap.min.css" rel="stylesheet">
            <link href="spiniastuff/font-awesome/css/font-awesome.css" rel="stylesheet">

            <link href="spiniastuff/css/animate.css" rel="stylesheet">
            <link href="spiniastuff/css/style.css" rel="stylesheet">

        </head>

        <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>

                    {{--<h1 class="logo-name">IN+</h1>--}}
                    <img alt="image" class="img-circle" src="spiniastuff/img/nowsud.jpg" />
                </div>
                <h3>Welcome to Nowsud</h3>
                <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                    <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
                </p>
                <p>Login in. To see it in action.</p>


                <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
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

                    <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="{{URL::to('/register')}}">Create an account</a>
                </form>
                <p class="m-t"> <small>Nowsud is an NGO based in Isiolo &copy; 2017</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        </body>
    </div>
</div>
{{--@endsection--}}

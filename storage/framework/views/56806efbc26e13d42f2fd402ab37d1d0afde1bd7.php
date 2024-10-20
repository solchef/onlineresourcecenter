


<div class="container">
    <div class="row">
        <!--<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>-->
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Pestmatic | Register</title>

            <link href="spiniastuff/css/bootstrap.min.css" rel="stylesheet">
            <link href="spiniastuff/font-awesome/css/font-awesome.css" rel="stylesheet">
            <link href="spiniastuff/css/plugins/iCheck/custom.css" rel="stylesheet">
            <link href="spiniastuff/css/animate.css" rel="stylesheet">
            <link href="spiniastuff/css/style.css" rel="stylesheet">

        </head>
        <body class="gray-bg">

        <div class="middle-box text-center loginscreen   animated fadeInDown">
            <div>
                <div>

                    
                    <img alt="image" class="img-circle" src="spiniastuff/img/logo.png" />

                </div>
                <h3>Register to Pestmatic</h3>
               <!--  <p>Create account to see it in action.</p> -->
                    <form class="m-t" method="POST" role="form" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Name" required autofocus>

                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                    <p class="text-muted text-center"><small>Already have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="<?php echo e(URL::to('/login')); ?>">Login</a>
                </form>
                <p class="m-t"> <small>Pestmatic is an company based in Nairobi &copy; 2017</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        </body>
    </div>
</div>


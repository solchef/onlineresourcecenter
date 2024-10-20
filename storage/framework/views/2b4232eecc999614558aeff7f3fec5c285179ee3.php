

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
    <meta name="author" content="webThemez.com">
    <title>eLearning </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="favicon" href="images/favicon.png">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="elerningtheme/css/bootstrap.min.css">
    <link rel="stylesheet" href="elerningtheme/css/font-awesome.min.css">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="elerningtheme/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="elerningtheme/css/da-slider.css" />
    <link rel="stylesheet" href="elerningtheme/css/style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>


    <br><br><br><br><br><br>

       <div class="wrapper wrapper-content" >
        <div class="middle-box text-center animated fadeInRightBig" style="background-color:white;">
            <h3 class="font-bold"><br/> Sorry Your Account is pending the Admin approval. <br>Once approved, we will notify you and you<br> will be able to login. <br><br>This will take less than 24 hours.</h3>
            <div class="error-desc">
                <br>
               Please contact our support team at info@onlineresourcecenter.nl  for any more enquiries.

               <br>Thank You.
                <br><br>
                 <a href="<?php echo e(route('logout')); ?>" class="btn btn-success" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out "></i><span class=""> Go Back </span>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                </form> 
            </div>
        </div>
    </div>


    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="elerningtheme/js/modernizr-latest.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="elerningtheme/js/jquery.cslider.js"></script>
    <script src="elerningtheme/js/custom.js"></script>
</body>
</html>





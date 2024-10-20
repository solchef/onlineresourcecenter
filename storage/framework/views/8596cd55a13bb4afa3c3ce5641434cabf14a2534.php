<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo app('translator')->getFromJson('Online Resource Center'); ?></title>

    <link href="<?php echo e(asset('spiniastuff/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('spiniastuff/css/font/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('spiniastuff/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('spiniastuff/css/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('spiniastuff/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('spiniastuff/css/dropzone.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('spiniastuff/css/plugins/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">

   <!-- <link rel="stylesheet" type="text/css" href="dist/sweetalert.css"> -->

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript">
     function loadtime(){

                 var now = new Date().toLocaleTimeString();
                  var demo= document.getElementById('demo');
                  demo.value = now;
               // console.log(now)
               }
                 </script>
</script>

<style type="text/css">
    ::-webkit-scrollbar { 
    display: none; 
}
</style>

</head>

<body onload="loadtime()" class="md-skin pace-done">
<!-- Side Menu-->
    <div id="wrapper back " style="">
    <nav class="navbar-default navbar-static-side" role="navigation" style="margin-top: 60px; z-index: 99999; position: fixed; height: 100%; overflow: scroll; scroll-behavior: unset;">
        <div class="sidebar-collapse ">
        <?php if(Auth::check()): ?>
            <ul class="nav metismenu " id="side-menu">
            <li class="nav-header" style="">
            <div class="dropdown profile-element"> <span>
                <?php if(empty(Auth::user()->avatar)): ?>
                <img alt="image" height="70" width="120" class="img-circle" src="<?php echo e(asset('spiniastuff/img/profile_big.jpg')); ?>" />
                <?php else: ?>
                    <img alt="image" height="70" width="120" class="img-circle" src="<?php echo e(asset('avatars/' . Auth::user()->avatar)); ?>" />

                    <?php endif; ?>
                     </span>

                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class=""> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                     </span> <span class="text-muted text-xs block"><b class="caret "><h3><?php echo e(Auth::user()->name); ?></h3></b></span> </span> </a>
                     <?php ($id = Auth::user()->id); ?>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                
                    <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
               <?php echo app('translator')->getFromJson('ONLINE RESOURCE CENTER'); ?>
            </div>
        </li>

             <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 3 OR Auth::user()->roleid == 5): ?>
               
                <li class="active">
                    <a href="<?php echo e(url('home')); ?>"><i class="fa fa-institution (alias)"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Dashboard'); ?></span> </a>
                </li>

              <?php if(Auth::user()->roleid == 5): ?>
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label">Admissions</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                     <li><a href="<?php echo e(url('admissionsapproval')); ?>">Approve Newly Enrolled</a></li>
                    <li><a href="<?php echo e(url('manageusers')); ?>">Manage Student Accounts</a></li>
                        <li><a href="<?php echo e(url('deactivatedstudents')); ?>">Deactivated Accounts</a></li>
                         
                    </ul>
                </li>

                <li>
                <a href="#"><i class="fa fa-quora"></i> <span class="nav-label">Fee Payment</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                         <li><a href="<?php echo e(url('paymentsapproval')); ?>">Approve Payments</a></li>
          
                    </ul>
                </li>

                  <?php endif; ?>

                  <?php if(Auth::user()->roleid == 2): ?>
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Courses'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(url('viewcoursescert')); ?>"><?php echo app('translator')->getFromJson('Certificate Courses'); ?></a></li>
                        <li><a href="<?php echo e(url('viewcoursesdip')); ?>"><?php echo app('translator')->getFromJson('Diploma Courses'); ?></a></li>
                        <li><a href="<?php echo e(url('viewcoursespost')); ?>"><?php echo app('translator')->getFromJson('Post-Graduate Courses'); ?></a></li>
                         
                    </ul>
                </li>

                <li>
                <a href="#"><i class="fa fa-quora"></i> <span class="nav-label">Assignments</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                
                   
                         <li><a href="<?php echo e(url('viewsubmissions')); ?>"><?php echo app('translator')->getFromJson('View Submissions'); ?></a></li>
          
                    </ul>
                </li>

                  <?php endif; ?>
                 <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5): ?>
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Courses'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                       
                        <li><a href="<?php echo e(url('addcourse')); ?>"><?php echo app('translator')->getFromJson('Add New Course'); ?></a></li>
                        <li><a href="<?php echo e(url('viewcoursescert')); ?>"><?php echo app('translator')->getFromJson('Certificate Courses'); ?></a></li>
                        <li><a href="<?php echo e(url('viewcoursesdip')); ?>"><?php echo app('translator')->getFromJson('Diploma Courses'); ?></a></li>
                        <li><a href="<?php echo e(url('viewcoursespost')); ?>"><?php echo app('translator')->getFromJson('Post-Graduate Courses'); ?></a></li>
                         
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->roleid == 3): ?>
                 <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('My Course'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                          <li><a href="<?php echo e(url('studentnotes')); ?>"><?php echo app('translator')->getFromJson('View Notes'); ?></a></li>
                          <li><a href="<?php echo e(url('viewassignments')); ?>"><?php echo app('translator')->getFromJson('View Assignments'); ?></a></li>
                          <li><a href="<?php echo e(url('submittedassignments')); ?>"><?php echo app('translator')->getFromJson('Submitted Assignments'); ?></a></li>
                  </ul>
                </li>
                <?php endif; ?>

                 <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5): ?>

                 <li>
                    <a href="#"><i class="fa fa-quora"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Assignments'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                
                   
                         <li><a href="<?php echo e(url('viewsubmissions')); ?>"><?php echo app('translator')->getFromJson('View Submissions'); ?></a></li>
          
                    </ul>
                </li>
                      <?php endif; ?>

              <li>
                    <a href="#"><i class="fa fa-space-shuttle"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Library References'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                      <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5): ?>
                        <li><a href="<?php echo e(url('libraryreference')); ?>"><?php echo app('translator')->getFromJson('Create References'); ?></a></li>
                         <!-- <li><a href="<?php echo e(url('pastpaper')); ?>">Upload Past Papers</a></li> -->
                         <li><a href="<?php echo e(url('articles')); ?>"><?php echo app('translator')->getFromJson('Create Article'); ?></a></li>
                         <!-- <li><a href="<?php echo e(url('createvideolecture')); ?>">Upload a Video</a></li> -->
                         <?php endif; ?>
                         <li><a href="<?php echo e(url('viewreferences')); ?>"><?php echo app('translator')->getFromJson('View references'); ?></a></li>
                         <!-- <li><a href="<?php echo e(url('viewpapers')); ?>">View Past Papers</a></li> -->
                         <li><a href="<?php echo e(url('viewarticles')); ?>"><?php echo app('translator')->getFromJson('View Articles'); ?></a></li>
                         <!-- <li><a href="<?php echo e(url('viewvideos')); ?>">View Videos</a></li> -->
                       
                         
                    </ul>
              </li>

                <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5): ?>
               <li>
                    <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Manage Users'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                      
                        <!-- <li><a href="<?php echo e(url('searchusers')); ?>">Search User</a></li> -->
                        <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5): ?>
                         <li >
                            <a href="#"><?php echo app('translator')->getFromJson('System Admin'); ?> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                 <li>
                                    <a href="<?php echo e(url('addadmin')); ?>"><?php echo app('translator')->getFromJson('Add Adminstrator'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('manageadmin')); ?>"><?php echo app('translator')->getFromJson('View Adminstrators'); ?></a>
                                </li>

                                
                            </ul>
                        </li>

                        <?php endif; ?>
                        <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5): ?>
                         <li >
                            <a href="#"><?php echo app('translator')->getFromJson('Students'); ?> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                 <?php if(Auth::user()->roleid == 1): ?>
                                 <li>
                                    <a href="<?php echo e(url('addstudent')); ?>"><?php echo app('translator')->getFromJson('Add Students'); ?></a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo e(url('manageusers')); ?>">Continuing Students</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('graduatestudents')); ?>">Graduated Students</a>
                                </li>

                                
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                 <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 3): ?>
                <li>
                    <a href="#"><i class="fa fa-print"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Financials'); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <?php if(Auth::user()->roleid == 1): ?>
                        <li><a href="<?php echo e(url('manageusers')); ?>"><?php echo app('translator')->getFromJson('Students Statements'); ?></a></li>
  
                           <?php endif; ?>
                         <?php if(Auth::user()->roleid == 3): ?>
         
                           <li><a href="<?php echo e(url('studentstatement')); ?>/<?php echo e(Auth::user()->id); ?>"><?php echo app('translator')->getFromJson('View Fee Statement'); ?></a></li>
                           <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5): ?>

                 <li>
               
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Settings'); ?> </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(url('regcampus')); ?>"><?php echo app('translator')->getFromJson('Campuses'); ?></a></li>
                        <li><a href="<?php echo e(url('addfaculties')); ?>"><?php echo app('translator')->getFromJson('Faculties'); ?></a></li>
                        <li><a href="<?php echo e(url('adminnotifications')); ?>"><?php echo app('translator')->getFromJson('Notifications'); ?></a></li>
                      
                    </ul>
                </li>
                  <?php endif; ?>

                  <?php if(Auth::user()->roleid == 3 OR Auth::user()->roleid ==2 OR Auth::user()->roleid ==1): ?>
                   <li>
                    <a href="<?php echo e(url('updateprofile')); ?>/<?php echo e(Auth::user()->id); ?>"><i class="fa fa-user"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('My profile'); ?></span></a>
                </li>
                
                <?php endif; ?>
                 <?php if(Auth::user()->roleid == 3): ?>
                    <li>
               
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label"><?php echo app('translator')->getFromJson('Settings'); ?> </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(url('resetpassadmin')); ?>"><?php echo app('translator')->getFromJson('Reset Password'); ?></a></li>
                    </ul>
                </li>
             <?php endif; ?>

             <?php endif; ?>
           
           
   
             <?php if(Auth::user()->roleid == 4 OR Auth::user()->roleid == 5): ?>
        
              <u>Accounting Functions</u>
               <?php if(Auth::user()->roleid == 4): ?>
                <li class="active">
                    <a href="<?php echo e(url('home')); ?>"><i class="fa fa-institution (alias)"></i> <span class="nav-label">Dashboard</span> </a>
                </li>
                <?php endif; ?>

                  
                <li>
                    <a href="<?php echo e(url('studentfees')); ?>"><i class="fa fa-pencil"></i> <span class="nav-label">Receive Payment</span></a>
                 
                </li>

<!--                 <li>
                    <a href="<?php echo e(url('feestructure')); ?>"><i class="fa fa-book"></i> <span class="nav-label">Fees Structure</span></a>
                 
                </li> -->



                 <li>
               
                    <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                  <li>
                    <a href="<?php echo e(url('viewpayments')); ?>"><i class="fa fa-eye"></i> <span class="nav-label">View Payments</span></a>
                 
                </li>

                  <li>
                    <a href="<?php echo e(url('viewbalances')); ?>"><i class="fa fa-book"></i> <span class="nav-label">View Balances</span></a>
                 
                </li>
                    </ul>
                </li>



                <li>
                    <a href="<?php echo e(url('studentstatements')); ?>"><i class="fa fa-list"></i> <span class="nav-label">Student Statements</span></a>
                 
                </li>

                 <li>             
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Payment Reports</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                  <li>
                    <a href="<?php echo e(url('campuspayments')); ?>"><i class="fa fa-book"></i> <span class="nav-label">Payments By Campus</span></a>
                 
                </li>

                  <li>
                    <a href="<?php echo e(url('facultypayments')); ?>"><i class="fa fa-book"></i> <span class="nav-label">Payments By faculty</span></a>
                 
                </li>

          <!--       <li>
                    <a href="<?php echo e(url('coursepayments')); ?>"><i class="fa fa-book"></i> <span class="nav-label">Payments By Course</span></a>
                 
                </li>

                <li>
                    <a href="<?php echo e(url('allpayments')); ?>"><i class="fa fa-book"></i> <span class="nav-label">All Payments</span></a>
                 
                </li> -->
                    </ul>
                </li>

                <li>
                    <a href="<?php echo e(url('resetpassadmin')); ?>"><i class="fa fa-cog"></i> <span class="nav-label">Change Password</span></a>
                 
                </li>
              </ul>
              <?php endif; ?>
              <?php endif; ?>
         
        </div>
    </nav>
        <!-- Top Nav-->
        <div id="page-wrapper" style="">
      <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-arrows-alt"></i> </a>
        </div>
        
        <ul class="nav navbar-top-links navbar-left">
            <li class="text-white">Online Resource Center - <?php echo e(Config::get('app.locale')); ?></li>
           <!-- <img alt="image" class="img-circle" height="70" width="100" src="<?php echo e(asset('spiniastuff/img/logo_bk.png')); ?>" /> <strong class="text-white"><a href="<?php echo e(url('/')); ?>" class="text-white"> ONLINE RESOURCE CENTRE </a></strong></li> -->
                    <li><a href="<?php echo e(url('/')); ?>" data-toggle="tooltip" data-placement="bottom" title="Read Campus News">
                            <span class="fa fa-newspaper-o text-mute text-white"></span>
                            <span class="text-white"><?php echo app('translator')->getFromJson('Home'); ?> </span></a>
                    </li>

              </ul>
                            
        </ul>
         <?php if(Auth::check()): ?>
            <ul class="nav navbar-top-links navbar-right">
                         <li>
                               <span class=""> <label" id="demo"></label"></span>

                        
                            </li>
                <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2): ?>

                <li>
                    <a href="<?php echo e(url('viewtickets')); ?>">
                    <span class="m-r-sm text-muted welcome-message text-white"><?php echo app('translator')->getFromJson('View Enquiries'); ?> <i class="fa fa-headphones"></i></span>
                </a>
                </li>

            

                <?php else: ?>
                <li>
                    <a href="<?php echo e(url('support')); ?>">
                    <span class="m-r-sm text-muted welcome-message text-white"><?php echo app('translator')->getFromJson('Enquiry Desk'); ?> <i class="fa fa-headphones"></i></span>
                </a>
                </li>
               

               <?php endif; ?>

              <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                       <?php echo app('translator')->getFromJson('Notifications'); ?>  <i class="fa fa-bell"></i>   <span class="label label-warning" id="notcount"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages" id="notificationsboard">

                  
                  
                    </ul>
                </li>

           <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-flag"></i><?php echo app('translator')->getFromJson('Language'); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="<?php echo e(url('setlanguage')); ?>?lang=en" class="dropdown-item">
                                <div>
                                    <i class="fa fa-flag fa-fw"></i> <?php echo app('translator')->getFromJson('English'); ?>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>

                            <li>
                            <a href="<?php echo e(url('setlanguage')); ?>?lang=fr" class="dropdown-item">
                                <div>
                                    <i class="fa fa-flag fa-fw"></i> <?php echo app('translator')->getFromJson('French'); ?>
                                   
                                </div>
                            </a>
                        </li>
                   
                    </ul>
                </li>


                <li>
                    <span class="m-r-sm text-muted welcome-message text-white"><?php echo app('translator')->getFromJson('Welcome'); ?>: <?php echo e(Auth::user()->name); ?></span>
                </li>

                <li>
                    <a href="<?php echo e(route('logout')); ?>" class="text-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out text-white"></i><span class="text-white"> <?php echo app('translator')->getFromJson('Log out'); ?> </span>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form> 
                </li>
            </ul>
            <?php endif; ?>

        </nav>
        </div>
         <div class="col-md-12" style="position: absolute; top: 80px; z-index: 9999;">
                <?php if(Session::has('errors')): ?>
                    <section class="alert alert-danger">
                        <?php echo e(Session::get('errors')); ?>

                    </section>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                    <section class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </section>
                <?php endif; ?>
            </div>


        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   
                    <h4 class="modal-title">System User Manual</h4>
                   
                </div>
                <div class="modal-body">
                    <h3>First Time Access</h3>
                        <hr>
                        <p>When accessing the system for the first time. The default password was 123456. Please click on settings->Reset Password to set your new password.</p>
                    <h3>Access Notes</h3>
                    To access your course notes, Click on the notes tab at your dashboard. This will direct you to  the notes area. select the unit to view notes from the radio buttons.
                        <hr>
                    <h3>Access Video Lectures</h3>
                        <hr>
                    <h3>Access And Submit Assignments</h3>
                </div>

            </div>
        </div></div>


    <div class="wrapper wrapper-content" style="margin-top: 30px;">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    </div>











<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@lang('Online Resource Center')</title>

    <link href="{{ asset('spiniastuff/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('spiniastuff/css/font/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('spiniastuff/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('spiniastuff/css/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('spiniastuff/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('spiniastuff/css/dropzone.css') }}" rel="stylesheet">

    <link href="{{ asset('spiniastuff/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">

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
        @if(Auth::check())
            <ul class="nav metismenu " id="side-menu">
            <li class="nav-header" style="">
            <div class="dropdown profile-element"> <span>
                @if(empty(Auth::user()->avatar))
                <img alt="image" height="70" width="120" class="img-circle" src="{{ asset('spiniastuff/img/profile_big.jpg') }}" />
                @else
                    <img alt="image" height="70" width="120" class="img-circle" src="{{ asset('avatars/' . Auth::user()->avatar) }}" />

                    @endif
                     </span>

                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class=""> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                     </span> <span class="text-muted text-xs block"><b class="caret "><h3>{{Auth::user()->name}}</h3></b></span> </span> </a>
                     @php($id = Auth::user()->id)
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
               @lang('ONLINE RESOURCE CENTER')
            </div>
        </li>

             @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 3 OR Auth::user()->roleid == 5)
               
                <li class="active">
                    <a href="{{url('home')}}"><i class="fa fa-institution (alias)"></i> <span class="nav-label">@lang('Dashboard')</span> </a>
                </li>

              @if(Auth::user()->roleid == 5)
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label">Admissions</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                     <li><a href="{{url('admissionsapproval')}}">Approve Newly Enrolled</a></li>
                    <li><a href="{{url('manageusers')}}">Manage Student Accounts</a></li>
                        <li><a href="{{url('deactivatedstudents')}}">Deactivated Accounts</a></li>
                         
                    </ul>
                </li>

                <li>
                <a href="#"><i class="fa fa-quora"></i> <span class="nav-label">Fee Payment</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                         <li><a href="{{url('paymentsapproval')}}">Approve Payments</a></li>
          
                    </ul>
                </li>

                  @endif

                  @if(Auth::user()->roleid == 2)
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label">@lang('Courses')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{url('viewcoursescert')}}">@lang('Certificate Courses')</a></li>
                        <li><a href="{{url('viewcoursesdip')}}">@lang('Diploma Courses')</a></li>
                        <li><a href="{{url('viewcoursespost')}}">@lang('Post-Graduate Courses')</a></li>
                         
                    </ul>
                </li>

                <li>
                <a href="#"><i class="fa fa-quora"></i> <span class="nav-label">Assignments</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                
                   
                         <li><a href="{{url('viewsubmissions')}}">@lang('View Submissions')</a></li>
          
                    </ul>
                </li>

                  @endif
                 @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5)
                <li>
                    <a href="#"><i class="fa fa-eye"></i> <span class="nav-label">@lang('Courses')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                       
                        <li><a href="{{url('addcourse')}}">@lang('Add New Course')</a></li>
                        <li><a href="{{url('viewcoursescert')}}">@lang('Certificate Courses')</a></li>
                        <li><a href="{{url('viewcoursesdip')}}">@lang('Diploma Courses')</a></li>
                        <li><a href="{{url('viewcoursespost')}}">@lang('Post-Graduate Courses')</a></li>
                         
                    </ul>
                </li>
                @endif
                @if(Auth::user()->roleid == 3)
                 <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">@lang('My Course')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                          <li><a href="{{url('studentnotes')}}">@lang('View Notes')</a></li>
                          <li><a href="{{url('viewassignments')}}">@lang('View Assignments')</a></li>
                          <li><a href="{{url('submittedassignments')}}">@lang('Submitted Assignments')</a></li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5)

                 <li>
                    <a href="#"><i class="fa fa-quora"></i> <span class="nav-label">@lang('Assignments')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                
                   
                         <li><a href="{{url('viewsubmissions')}}">@lang('View Submissions')</a></li>
          
                    </ul>
                </li>
                      @endif

              <li>
                    <a href="#"><i class="fa fa-space-shuttle"></i> <span class="nav-label">@lang('Library References')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                      @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5)
                        <li><a href="{{url('libraryreference')}}">@lang('Create References')</a></li>
                         <!-- <li><a href="{{url('pastpaper')}}">Upload Past Papers</a></li> -->
                         <li><a href="{{url('articles')}}">@lang('Create Article')</a></li>
                         <!-- <li><a href="{{url('createvideolecture')}}">Upload a Video</a></li> -->
                         @endif
                         <li><a href="{{url('viewreferences')}}">@lang('View references')</a></li>
                         <!-- <li><a href="{{url('viewpapers')}}">View Past Papers</a></li> -->
                         <li><a href="{{url('viewarticles')}}">@lang('View Articles')</a></li>
                         <!-- <li><a href="{{url('viewvideos')}}">View Videos</a></li> -->
                       
                         
                    </ul>
              </li>

                @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5)
               <li>
                    <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">@lang('Manage Users')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                      
                        <!-- <li><a href="{{url('searchusers')}}">Search User</a></li> -->
                        @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5)
                         <li >
                            <a href="#">@lang('System Admin') <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                 <li>
                                    <a href="{{url('addadmin')}}">@lang('Add Adminstrator')</a>
                                </li>
                                <li>
                                    <a href="{{url('manageadmin')}}">@lang('View Adminstrators')</a>
                                </li>

                                
                            </ul>
                        </li>

                        @endif
                        @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2 OR Auth::user()->roleid == 5)
                         <li >
                            <a href="#">@lang('Students') <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                 @if(Auth::user()->roleid == 1)
                                 <li>
                                    <a href="{{url('addstudent')}}">@lang('Add Students')</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('manageusers')}}">Continuing Students</a>
                                </li>
                                <li>
                                    <a href="{{url('graduatestudents')}}">Graduated Students</a>
                                </li>

                                
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                 @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 3)
                <li>
                    <a href="#"><i class="fa fa-print"></i> <span class="nav-label">@lang('Financials')</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @if(Auth::user()->roleid == 1)
                        <li><a href="{{url('manageusers')}}">@lang('Students Statements')</a></li>
  
                           @endif
                         @if(Auth::user()->roleid == 3)
         
                           <li><a href="{{url('studentstatement')}}/{{Auth::user()->id}}">@lang('View Fee Statement')</a></li>
                           @endif
                    </ul>
                </li>
                @endif
                @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5)

                 <li>
               
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">@lang('Settings') </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{url('regcampus')}}">@lang('Campuses')</a></li>
                        <li><a href="{{url('addfaculties')}}">@lang('Faculties')</a></li>
                        <li><a href="{{url('adminnotifications')}}">@lang('Notifications')</a></li>
                      
                    </ul>
                </li>
                  @endif

                  @if(Auth::user()->roleid == 3 OR Auth::user()->roleid ==2 OR Auth::user()->roleid ==1)
                   <li>
                    <a href="{{url('updateprofile')}}/{{Auth::user()->id}}"><i class="fa fa-user"></i> <span class="nav-label">@lang('My profile')</span></a>
                </li>
                
                @endif
                 @if(Auth::user()->roleid == 3)
                    <li>
               
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">@lang('Settings') </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{url('resetpassadmin')}}">@lang('Reset Password')</a></li>
                    </ul>
                </li>
             @endif

             @endif
           
           
   
             @if(Auth::user()->roleid == 4 OR Auth::user()->roleid == 5)
        
              <u>Accounting Functions</u>
               @if(Auth::user()->roleid == 4)
                <li class="active">
                    <a href="{{url('home')}}"><i class="fa fa-institution (alias)"></i> <span class="nav-label">Dashboard</span> </a>
                </li>
                @endif

                  
                <li>
                    <a href="{{url('studentfees')}}"><i class="fa fa-pencil"></i> <span class="nav-label">Receive Payment</span></a>
                 
                </li>

<!--                 <li>
                    <a href="{{url('feestructure')}}"><i class="fa fa-book"></i> <span class="nav-label">Fees Structure</span></a>
                 
                </li> -->



                 <li>
               
                    <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                  <li>
                    <a href="{{url('viewpayments')}}"><i class="fa fa-eye"></i> <span class="nav-label">View Payments</span></a>
                 
                </li>

                  <li>
                    <a href="{{url('viewbalances')}}"><i class="fa fa-book"></i> <span class="nav-label">View Balances</span></a>
                 
                </li>
                    </ul>
                </li>



                <li>
                    <a href="{{url('studentstatements')}}"><i class="fa fa-list"></i> <span class="nav-label">Student Statements</span></a>
                 
                </li>

                 <li>             
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Payment Reports</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                  <li>
                    <a href="{{url('campuspayments')}}"><i class="fa fa-book"></i> <span class="nav-label">Payments By Campus</span></a>
                 
                </li>

                  <li>
                    <a href="{{url('facultypayments')}}"><i class="fa fa-book"></i> <span class="nav-label">Payments By faculty</span></a>
                 
                </li>

          <!--       <li>
                    <a href="{{url('coursepayments')}}"><i class="fa fa-book"></i> <span class="nav-label">Payments By Course</span></a>
                 
                </li>

                <li>
                    <a href="{{url('allpayments')}}"><i class="fa fa-book"></i> <span class="nav-label">All Payments</span></a>
                 
                </li> -->
                    </ul>
                </li>

                <li>
                    <a href="{{url('resetpassadmin')}}"><i class="fa fa-cog"></i> <span class="nav-label">Change Password</span></a>
                 
                </li>
              </ul>
              @endif
              @endif
         
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
            <li class="text-white">Online Resource Center - {{ Config::get('app.locale') }}</li>
           <!-- <img alt="image" class="img-circle" height="70" width="100" src="{{ asset('spiniastuff/img/logo_bk.png') }}" /> <strong class="text-white"><a href="{{ url('/') }}" class="text-white"> ONLINE RESOURCE CENTRE </a></strong></li> -->
                    <li><a href="{{ url('/')}}" data-toggle="tooltip" data-placement="bottom" title="Read Campus News">
                            <span class="fa fa-newspaper-o text-mute text-white"></span>
                            <span class="text-white">@lang('Home') </span></a>
                    </li>

              </ul>
                            
        </ul>
         @if(Auth::check())
            <ul class="nav navbar-top-links navbar-right">
                         <li>
                               <span class=""> <label" id="demo"></label"></span>

                        
                            </li>
                @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 2)

                <li>
                    <a href="{{ url('viewtickets') }}">
                    <span class="m-r-sm text-muted welcome-message text-white">@lang('View Enquiries') <i class="fa fa-headphones"></i></span>
                </a>
                </li>

            

                @else
                <li>
                    <a href="{{ url('support') }}">
                    <span class="m-r-sm text-muted welcome-message text-white">@lang('Enquiry Desk') <i class="fa fa-headphones"></i></span>
                </a>
                </li>
               

               @endif

              <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                       @lang('Notifications')  <i class="fa fa-bell"></i>   <span class="label label-warning" id="notcount"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages" id="notificationsboard">

                  
                  
                    </ul>
                </li>

           <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-flag"></i>@lang('Language')
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="{{url('setlanguage') }}?lang=en" class="dropdown-item">
                                <div>
                                    <i class="fa fa-flag fa-fw"></i> @lang('English')
                                   
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>

                            <li>
                            <a href="{{url('setlanguage') }}?lang=fr" class="dropdown-item">
                                <div>
                                    <i class="fa fa-flag fa-fw"></i> @lang('French')
                                   
                                </div>
                            </a>
                        </li>
                   
                    </ul>
                </li>


                <li>
                    <span class="m-r-sm text-muted welcome-message text-white">@lang('Welcome'): {{Auth::user()->name}}</span>
                </li>

                <li>
                    <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out text-white"></i><span class="text-white"> @lang('Log out') </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form> 
                </li>
            </ul>
            @endif

        </nav>
        </div>
         <div class="col-md-12" style="position: absolute; top: 80px; z-index: 9999;">
                @if(Session::has('errors'))
                    <section class="alert alert-danger">
                        {{Session::get('errors')}}
                    </section>
                @endif
                @if(Session::has('success'))
                    <section class="alert alert-success">
                        {{Session::get('success')}}
                    </section>
                @endif
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
        @yield('content')
    </div>
    </div>











@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">



    <div class="row">
        <div class="col-lg-7 "  style="left: 200px;" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>This page does not exist</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                   
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                               <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">You have accessed a page that does not exist. Please click on the button below to be redirected.</h3>
            <div class="error-desc">
              			
                <br>
                 <a href="{{ route('home') }}" class="btn btn-success" >
                        <i class="fa fa-sign-out "></i><span class=""> Dashboard </span>
                    </a>
               
            </div>
        </div>              

    </div>

        </div>
      </div>
    </div>
  </div></div>
@include('layouts.adminfooter')
@endsection


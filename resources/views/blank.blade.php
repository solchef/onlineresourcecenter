@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">



  
                    <div class="row">
                               <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">This Module is still Under Maintenance</h3>
            <div class="error-desc">
               You will be notified when it will be restored. For Enquiries send an email to info@onlineresourcecenter.nl
                <br>
                <b>CHECK BACK SOON ( - : !</b>
                <br>
                 <a href="{{ route('home') }}" class="btn btn-success" >
                        <i class="fa fa-sign-out "></i><span class=""> Go Back </span>
                    </a>
               
            </div>
        </div>              

    </div>

      
    </div>

@include('layouts.adminfooter')
@endsection


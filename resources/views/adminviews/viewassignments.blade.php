
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

    <div class="row">    
     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('Course Assignments')</h5>
        </div>

        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
              
                <th>@lang('Assignment')</th>
                
                  <th>@lang('Download')</th>
                  <th>@lang('Submit')</th>
              
     
               
  

             <tbody>
                     @foreach($assignments as $ass)
                     <tr>
                        
                         <td>{{$ass->uploadassignment}}</td>
                         
                    
                         <td><a href="{{ asset('assignments') }}/{{$ass->uploadassignment}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> @lang('Download')</i></button></a> </td>
                         @if($today < $ass->submitby)
                         <td><a href="{{ url('submitassignment') }}/{{$ass->id}}" ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-code-fork"> @lang('Submit')</i></button></a></td> 
                        @else

                        <td><a href="{{ url('submitassignment') }}/{{$ass->id}}" ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-code-fork"> @lang('Submit')</i></button></a></td>
              <!--               <td>
                            <button id="{{$ass->id}}" class="btn btn-xs btn-danger col-md-12" data-toggle="modal" data-target="#myModalActivate">Expired</button>
                            </td> -->
                        @endif
                       
                        
                     </tr>
                     @endforeach
                 </tbody>
             </table>
            
               <nav>{{ $assignments->links() }}</nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-exclamation modal-icon"></i>
                    <h4 class="modal-title">OOPS</h4>
                    <h5>@lang('Assignment Submission Deadline Has Expired')</h5>
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body recordId" hidden >
                            
                        </div>

                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-blue pull-right" data-dismiss="modal">Okey</button>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    @include('layouts.adminfooter')
@endsection


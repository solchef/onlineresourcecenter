
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('View Library References')</h5>
        </div>
        <div class="ibox-content">
        <form method="get" action="viewreferences">
            <div class="col-md-3 pull-left">
                <label>@lang('Filter By Target Group')</label>
                <select class="form-control" name="type">
                    <option value="">@lang('Select Reference Type')</option>
                 <option value="1">@lang('Videos')</option>
                <option value="2">@lang('Books')</option>
                <option value="3">@lang('PastPapers')</option>
                <option value="4">@lang('Past Project Papers')</option>
                </select>
            </div>
            @if(Auth::user()->roleid == 1)
             <div class="col-md-3 pull-left">
                <label>@lang('Filter By Target Group')</label>
                <select class="form-control" name="target">
                    <option value="">@lang('Select Reference Type')</option>
                  @foreach($target as $tar)
                     <option value="{{$tar->id}}">{{$tar->course_name}}</option>
                  @endforeach
                </select>
            </div>
            @endif
            
             <div class="col-md-2">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">@lang('Filter Data')</button>
                
            </div>
        </form>
     <table class="table table-responsive table-stripped table-bordered">
    <thead>
    <tr>
        <th>@lang('Reference Type')</th>
        <th>@lang('Reference Name')</th>
        <!-- <th>Link</th> -->
        <th>@lang('View')</th>
   
        <th>@lang('Play')</th>
        

     @if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2)
        <th>@lang('Delete')</th>
    @endif 
    </tr>
    <tbody>
       @foreach($ref as $reff)
        <tr>
            @if($reff->referencetype == 1)
            <td>@lang('Videos')</td>
            @elseif($reff->referencetype == 2)
            <td>@lang('Books')</td>
            @elseif($reff->referencetype == 3)
            <td>@lang('Past Papers')</td>
            @elseif($reff->referencetype == 4)
            <td>@lang('Past project Papers')</td>
            @endif

            <td>{{$reff->reference_name}}</td>
    
            <!-- <td>{{$reff->referencelink}}</td> -->
             <td>  <a href="{{ asset('references') }}/{{$reff->details}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> </i>@lang('Download')</button></a></td>
             <!--  @if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2)
            <td><a href="deletereference/{{$reff->id}}"><button class="btn btn-danger btn-sm red-bg col-md-12">Delete</button></a></td>
             @endif -->

             @if($reff->referencetype == 1)
             <td><button class="btn btn-default manage-user" type="button" data-toggle="modal" data-target="manageuser" value="{{ asset('references') }}/{{$reff->details}}">@lang('Play Video')</button></td>
             @else
            <td> <label>@lang('No Action')</label> </td>
             @endif
	@if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2)
	 <td><a href="deletereference/{{$reff->id}}"><button class="btn btn-danger btn-sm red-bg col-md-12">@lang('Delete')</button></a></td>
	@endif
           
        </tr>

        @endforeach
    </tbody>
    </thead>
    <tbody>

    </tbody>
    </table>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>

    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
                    <h4 class="modal-title">Reference Details</h4>
                
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body recordId" hidden >
                            
                        </div>
                        @if(empty($reff))
                        <p>Blank</p>
                        @else
                        <p><strong>
                            <h4><u>Reference Name</u></h4><br>
                            {{$reff->reference_name}}
                            <hr>
                            <h4><u>Reference Link</u></h4>
                            <a href="{{$reff->referencelink}}">{{$reff->referencelink}}</a>
                            <hr>
                            <h4><u>Reference Details</u></h4>
                            {{$reff->details}}
                        </strong></p>
                        @endif

                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


                                <div class="modal inmodal" id="manageuser" tabindex="-1" style="margin-top: 50px;" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
<video width="720" height="405" controls  poster="">
    <source  src="" type="video/mp4" id="delete-user">

    Your browser does not support the video tag or the file format of this video.
</video>        
                                    </div>
                                </div>
                             </div>


    @include('layouts.adminfooter')
@endsection


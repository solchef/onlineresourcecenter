
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('Submit Assignment')</h5>
        </div>
        <div class="ibox-content">
            @if(!$checkifsubmitted)

           
        <h5>{{$assignments->uploadassignment}}
               <hr>
             <form role="form" method="post" action="{{ url('createassignment') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="assignmentid" value="{{$assignments->id}}">

                 <div class="form-group">
                        <label for="exampleInputEmail1">@lang('Submission Name')</label>
                         <input type="text" name="submisionname" class="form-control" required >
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('Upload files')</label>
                         <input type="file" name="assignment" class="form-control" multiple required>
                       
                    </div>

                    <button type="Submit" class="btn btn-default">@lang('Submit')</button>
                    
                </form>


            @else
            <p> You have already submitted  {{$assignments->uploadassignment}} Your previous submission will be replaced by this submission.</p>

                       <form role="form" method="post" action="{{ url('updatesubmission') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$assignments->id}}">

                 <div class="form-group">
                        <label for="exampleInputEmail1">@lang('Submission Name')</label>
                         <input type="text" name="submisionname" class="form-control" required >
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('Upload files')</label>
                         <input type="file" name="assignment" class="form-control" multiple required>
                       
                    </div>

                    <button type="Submit" class="btn btn-default">@lang('Submit')</button>
                    
                </form>


                @endif
        </div>
 
    </div>

</div>

     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('Previous Submissions')</h5>
        </div>
        <div class="ibox-content">
            
                <table class="table table-responsive table-stripped table-bordered">
                        <th>@lang('Name')</th>
                        <th>@lang('FileName')</th>
                        <th>@lang('Submitted On')</th>
                        <th>@lang('Status')</th>
                        <tbody>
                @foreach($othersubmissions as $others)
                <tr>
                <td>{{$others->submissionname}}</td>
                <td>{{$others->assfile}}</td>
                <td>{{$others->created_at}}</td>
                  @if($others->status == 1)
                <td><a href="{{ asset('assi') }}/{{$others->assfile}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> @lang('Received')</i></button></a></td>
                @else
                <td>
                <a href="{{ asset('assi') }}/{{$others->assfile}}" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> @lang('Pending')</i></button></a>
                </td>
                @endif
                 </tr>
                @endforeach
            </tbody>
           </table>
               
  
        </div>
 
    </div>

</div>
</div>
</div>







    @include('layouts.adminfooter')
@endsection


     
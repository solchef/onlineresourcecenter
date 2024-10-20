
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>@lang('My Submitted Assignments')</h5>
        </div>
        <div class="ibox-content">
            
                <table class="table table-responsive table-stripped table-bordered">
                        <th>@lang('Name')</th>
                        <th>@lang('FileName')</th>
                        <th>@lang('Submitted On')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Marked File')</th>
                        <th>@lang('Grade')</th>
                        <tbody>
                @foreach($sub as $others)
                <tr>
                <td>{{$others->submissionname}}</td>
                <td>{{$others->assfile}}</td>
                <td>{{$others->created_at}}</td>
                  @if($others->status == 1)
                <td><a href="{{ asset('assi') }}/{{$others->assfile}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> @lang('Received')</i></button></a></td>
                <td><a href="{{ asset('reverts') }}/{{$others->revertfile}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> @lang('Marked File')</i></button></a></td>
                <td>{{ $others->grade }}</td>
                @else

                <td>
                <a href="{{ asset('assi') }}/{{$others->assfile}}" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> @lang('Pending')</i></button></a>
                </td>
                <td><a href="#" ><button class="btn btn-xs btn-primary col-md-12"><i class="fa fa-download"> @lang('Un-Assessed')</i></button></a></td>
                <td>@lang('Pending')</td>
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


     
@extends('layouts.adminlayouts')

@section('content')
    <div class="wrapper wrapper-content">
        
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-title" style="background-color:#ffffff">
                      
                    </div>
                    <div>
                        <div class="ibox-content no-padding ">
                            @if(empty($user->avatar))
                           <center> <img alt="image" class="img-responsive" style="height: 150px; width: 150px;" src="{{ asset('spiniastuff/img/profile_big.jpg') }}"></center>
                           @else
                         <center> <img alt="image" class="img-responsive" style="height: 150px; width: 150px;" src="{{ asset('avatars/' . $user->avatar) }}"></center>
                           @endif
                           <br>
                          <center><button class="btn btn-danger btn-xs  " id="avatarchanger"><i class="fa fa-pencil"></i> @lang('Change Avatar')</button></center>
                          <div id="avatarform">
                            <form method="post" action="{{url('changeavatar')}}/{{Auth::user()->id}}" enctype="multipart/form-data">
                               {{csrf_field()}}
                                <label>@lang('Upload File')</label>
                                <input type="file" name="avatar" class="form-control">
                                <br>
                                <button class="btn btn-success btn-xs " type="submit" id=""><i class="fa fa-pencil"></i> @lang('Change Avatar')</button>
                            </form>
                          </div>
                        </div>
                        
                        <div class="ibox-content profile-content">


                          <center><h2>{{Auth::user()->name}}</h2></center>
                             <hr>

                        
                      @if(Auth::user()->roleid == 1)
                        
                      <ul class="nav">
                            <li class="active"><a  href="{{url('graduatestudent')}}/{{$user->id}}" class="btn btn-primary">Graduate Student</a></li>
                            <li class="active"><a  href="{{url('viewresults')}}/{{$user->id}}" class="btn btn-warning">View Results</a></li>
                            <li class="active"><a href="{{url('uploaddocuments')}}/{{$user->id}}" class="btn btn-success" >Upload Documents</a></li>
                            <li class="active"><a href="{{url('suspendstudent')}}/{{$user->id}}" class="btn btn-danger">Suspend Student</a></li>
                          </ul>

                        @else

            <p>Transcripts and Certificates</p>
                      
              <table class="table table-responsive table-stripped table-bordered">
                <!-- <th>#</th> -->
                 <!-- <th>Upload Date</th> -->
                 <!-- <th>Document Type</th> -->
                 <th>Document Name</th> 
                 <th>Download</th>
         

                 <tbody>
                   @foreach($docs as $doc)
                   <tr>
                     <!-- <td>{{ $doc->created_at }}</td> -->
                 <!--     @if($doc->type == 1)
                     <td>Transcript</td>
                     @else
                     <td>Certificate</td>
                     @endif -->
                     <td>{{ $doc->name }}</td>
                     <td><a href="{{asset('studentdocuments')}}/{{$doc->filename}}" download class="btn btn-success btn-sm">Download</a></td>
                  
                   </tr>
                   @endforeach
                 </tbody>

 
             </table>
                        

                       
             @endif             

                  
                        </div>
                    </div>
                </div>
 
            </div>
          <div class="col-md-8">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-title" style="background-color:#ffffff">
                        <h5 style="color: #009a46">@lang('Profile')</h5>

                        <a href="{{ url('addschedule') }}/{{ $user->id }}" class="btn btn-primary btn-sm pull-right">@lang('Create Schedules')</a>
                    </div>
                    <div>
                        <div class="ibox-content no-padding ">
                         
                        </div>

                         <div class="ibox-content profile-content">
                       
                             <h4><strong><i class="fa fa-user-circle"></i> @lang('Name'): {{ $user->name }} </strong></h4>

                            <p><strong><i class="fa fa-phone"></i> @lang('Phone Number'):</strong> {{$user->mobile}} </p>
                            <hr>

                            <p><strong><i class="fa fa-address-book"></i> @lang('Email Address'):</strong> {{$user->email}} </p>
                            <hr>

                            @if($user->roleid == 3)
                           
                            <p><strong><i class="fa fa-cubes"></i> @lang('Enrolled Course'):</strong> {{$user->course_name}}</p>
                           
                            <hr>
                            <p><strong><i class=" fa fa-question"></i> @lang('Course Duration'):</strong> {{$user->coursestart}} - {{$user->courseend}}</p>
                            <hr>

                             <p><strong><i class="fa fa-map-marker"></i> @lang('Residence'):</strong> {{$user->residence}} </p>
                            <hr>

                             <p><strong><i class="fa fa-cog"></i> @lang('Occupation'):</strong> {{$user->occupation}} </p>
                             @endif
                            <hr>

                            <div class="user-button">
                               
                            </div>
                        </div>
                    </div>

                    <h5 style="color: #009a46">@lang('Profile')</h5>
                </div>
 
            </div>
        </div>
            
 </div>
         





   
 @include('layouts.adminfooter')
 <script type="text/javascript">
$(document) .ready(function(){
 $('#avatarform').hide();

 $('#avatarchanger').click(function(){
   $('#avatarform').show();
});
 });



</script>
@endsection
     
        
       

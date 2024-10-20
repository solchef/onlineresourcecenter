
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>View Course Videos</h5>
        </div>
         <div class="ibox-content">
            <div class="row">
                 @if(Auth::user()->roleid == 1)
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                         
                               <div class="form-group">
                                <label>Select Faculty</label>
                                <select class="form-control" name="faculty">
                                    <option value="">Select Faculty</option>
                                </select>
                               </div>
                                <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="faculty">
                                    <option value="">Select Course</option>
                                    @foreach($target as $tar)
                                     <option value="{{$tar->id}}">{{$tar->course_name}}</option>
                                   @endforeach
                                </select>
                               </div>
                           
                          
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">

                            

                            <h4><u>Course Description</u></h4>
                            <hr>
                            <h5><u>Course Name: Public Health</u></h5>
                            <p>
                                This Course introduces you to general public health concepts and advanced concepts of working with pulblic health.Students learn of the various issues affecting the general public in termasof health facilitation. etc
                            </p>
                           
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                <div class="col-lg-8 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                     @foreach($videos as $video)
                            <div class="file-box">
                                <div class="file">
                                  
                                     <a href="{{ asset('videolecturers') }}/{{$video->videofile}}" download>
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="spiniastuff/img/pastpaper.jpg">
                                        </div>
                                        <div class="file-name">
                                            {{$video->videoname}}
                                            <br/>
                                            <small>Added: {{$video->created_at}}</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            @endforeach
                            
                         
                      

                        </div>
                    </div>
                    </div>

            </div>
           

      
    <!--/span-->

     

</div>
</div>
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
                       
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @include('layouts.adminfooter')
@endsection


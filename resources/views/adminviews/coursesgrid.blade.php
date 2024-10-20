
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">

  
        <div class="ibox-title">
            <h5>View Past Papers</h5>
        </div>
         <div class="ibox-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                               @if(Auth::user()->roleid == 1)
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
                               @endif
                                <div class="hr-line-dashed"></div>
                               <h4>Unit Folders<small>(click on a folder to view its files)</small></h4>
                                <div class="hr-line-dashed"></div>
                                
                                <ul class="folder-list" style="padding: 0">
                                   
                                </ul>
                           
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                     @foreach($courses as $course)
                            <div class="file-box">
                                <div class="file">
                                  
                                     <a href="" download>
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="spiniastuff/img/pastpaper.jpg">
                                        </div>
                                        <div class="file-name">
                                            {{$course->course_name}}
                                            <br/>
                                            <small>Added: {{$course->created_at}}</small>
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



@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Assignments</h5>

        </div>

        <div class="ibox-content">
            <form action="viewsubmissions" method="get">

      

           <!--      <select class="blue-bg col-md-3 pull-right" name="assi">
                    <option value="">Select Assignment to view Submissions</option>
                    @foreach($filterobj as $obj)
                    <option value="{{$obj->id}}">{{$obj->uploadassignment}}</option>
                    @endforeach
                </select> -->

              <div class="col-md-3 pull-left">
                <label>Filter By Faculty</label>
                <select class="form-control" name="faculty" id="coursefaculty">
                    <option value="">Select Faculty</option>
                     @foreach($faculties as $fac)
                        <option value="{{$fac->id}}">{{$fac->faculty_name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="col-md-3 pull-left">
                <label>Filter By Course</label>
                <select class="form-control" name="course" id="courselist">
                 
                </select>
            </div>
             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>

       

                
         </form>
    
             <table class="table table-responsive table-stripped table-bordered">
                <th>#</th>
                <!-- <th>Check</th> -->
           
                <th>Assignment</th>
                 <th>Deadline</th>
                  <th>Submitted By</th>
                  <th>Submitted AT</th>
                  <th>Download</th>
                 <th>Grading</th>
                 <th>Edit Grade</th>
     
               
  

             <tbody>
                @php($count = 1)
                     @foreach($assignments as $ass)
                     <tr>
                        <td>{{$count}}</td>
                        <!-- <td><input type="checkbox" class="" id="checker"> <span class="cr"><i class="cr-icon fa fa-rocket"></i></span></td> -->
              
                         <td>{{$ass->submissionname}}</td>
                         <td>{{$ass->submitby}}</td>
                         <td>{{$ass->name}}</td>
                          <td>{{$ass->created_at}}</td>
                        @if($ass->status == 0)
                         <td>
                            <form action="downloadstatus/{{$ass->id}}" method="get">

                            <a href="{{ asset('assi') }}/{{$ass->assfile}}" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> Download</i></button></a>
                        </form>
                        </td>
                        @else 
                        <td>
                            <a href="{{ asset('assi') }}/{{$ass->assfile}}" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> Downloaded</i></button></a>
                        </td>
                        @endif
                         <td>
                        @if(empty($ass->grade)) 
                          <button id="{{$ass->id}}" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalActivate">Grade</button>
                         @else
                          {{$ass->grade}}
                          @endif
                        </td>
                        <td>
                        @if(empty($ass->grade)) 
                        <button id="{{$ass->id}}" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalEdit" disabled><i class="fa fa-pencil"></i>Edit</button>
                         @else
                          <button id="{{$ass->id}}" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-pencil"></i>Edit</button>
                          @endif
                        </td>
                        
                        
                     </tr>
                     @php($count ++)
                     @endforeach
                 </tbody>
             </table>
          
            @php($cou = \Illuminate\Support\Facades\Input::get('course'))
            @if($cou)
            <nav class="navigation">{{ $assignments->appends(['course' => $cou])->links() }}</nav>
            @else
              <nav class="navigation">{{$assignments->links()}}</nav>
            @endif
               
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
                   
                    <h4 class="modal-title">Grade the Student</h4>
                   
                </div>
                <div class="modal-body">
                    <form action="{{ ('grading') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                         <div class="form-group">
                         <label>Upload Marked Assignments</label>
                         <input type="file" name="revertfile" class="form-control">
                        </div>

                           <div class="form-group">
                         <label>Enter the Score</label>
                         <input type="text" name="grade" class="form-control">
                        </div>
                        <hr>
                         <div class="modal-body recordId" hidden>
                            
                        </div>
                     
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Submit Grade</button>

                        </div>
                    </form>
                </div>

            </div>
        </div></div>

         <div class="modal inmodal" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   
                    <h4 class="modal-title">Edit the Student Grade</h4>
                   
                </div>
                <div class="modal-body">
                    <form action="{{ ('editgrade') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                         <label>Upload Marked Assignments</label>
                         <input type="file" name="revertfile" class="form-control">
                        </div>
                      

                           <div class="form-group">
                         <label>Enter the new score</label>
                         <input type="text" name="grade" class="form-control">
                        </div>
                        <hr>
                         <div class="modal-body recordId" hidden>
                            
                        </div>
                     
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Update Grade</button>

                        </div>
                    </form>
                </div>

            </div>
        </div></div>





    @include('layouts.adminfooter')
@endsection


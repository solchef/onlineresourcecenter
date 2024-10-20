 @extends('layouts.adminlayouts')

@section('content')

 <div class="wrapper wrapper-content animated fadeInRight">

        <div class="ibox float-e-margins">
    
       @if(Auth::user()->roleid == 1 OR Auth::user()->roleid ==2)   
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

              
                    <div class="profile-info">
                        <div class="">
                  
                            <div>
                                <h4 class="no-margins">
                                  Code:  {{$units->course_code}}
                                </h4>
                                <h4>Name:  {{$units->course_name}}</h4>
                                <p>
                               
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table large m-b-xs">
                        <tbody>
                        <tr>
                            <td><p>

                                <small>
                    <h2 class="no-margins">Active since:{{ $units->created_at }}</h2></small>
                           </p></td>
                          
                        </tr>
                        </tbody>
                    </table>

                 
                </div>
             

            </div>
            @else
            <div class="row ">

                            <div>
                                <h4 class="no-margins">
                                    {{$units->unit_code}} :

                                     {{$units->unit_name}} -  <small>
                                  {{ $units->description }}
                                </small>
                                </h4>
                               
                               
                            </div>
                       
            </div>

           @endif
           <hr>
            <div class="row">
                      <div class="col-md-12">
           
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                       
                            
                            <li class="active"><a data-toggle="tab" href="#tab-2">Course Notes</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3">Course Assignments</a></li>
           
                        </ul>
                        <div class="tab-content">
               



<div id="tab-2" class="tab-pane active">
<div class="panel-body">          
<div class="row">
        @if(Auth::user()->roleid == 1)
        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> Course Notes</h5><small>Upload New </small>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="{{ url('uploadnotes') }}/{{ $units->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="course_id" value="">

         
                    <input type="hidden" name="topic_id" value="1">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose file (Only PDF Format)</label>
                         <input type="file" name="notes" class="form-control" multiple required accept="application/pdf">
                       
                    </div>

                    <button type="Submit" class="btn btn-default">Submit</button>
                    
                </form>
        </div>
        </div>
        </div>

@endif
 
   <div class="col-lg-8">

        <div class="ibox-title">
            <h5>Uploaded Notes</h5>
        </div>

            <table class="table">
            <thead>
              <th>Notes</th>
           @if(Auth::user()->roleid == 1)
              <th>Download</th>
              <th>Delete</th>
           @endif
            </thead>
            <tbody>
               @foreach($coursenotes as $notes)
              <tr>
                <td>{{$notes->notes}}</td>
               @if(Auth::user()->roleid == 1)
                <td><a href="{{ asset('coursenotes') }}/{{$notes->notes}}" download>Download</a></td>
                <td><a href="{{ url('deletenotes') }}/{{$notes->id}}" >Delete</a></td>
                @endif
              </tr>
              @endforeach
            </tbody>
            
          </table>
        

 
    </div>

          </div>
                </div>
                      </div>
                            
        <div id="tab-3" class="tab-pane">
           <div class="panel-body">
                                                
            
<div class="row">
  @if(Auth::user()->roleid == 1)
        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> Course Assignments</h5><small>Upload New</small>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="{{ url('uploadassignment') }}/{{ $units->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="course_id" value="">

                    <input type="hidden" name="topic_id" value="1">


                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Assignment DeadLine</label> -->
                         <input type="date" hidden value="12-12-2018" name="dateline" class="form-control"required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose file (only PDF Format)</label>
                         <input type="file" name="notes" class="form-control" multiple required accept="application/pdf">
                       
                    </div>


                 
                  
                    <button type="Submit" class="btn btn-default">Submit</button>
                    
                </form>
</div>
</div>
</div>
@endif

      
    <!--/span-->

<div class="col-lg-8">
      
        <div class="ibox-title">
            <h5>Uploaded Assignment</h5>
        </div>
        
   
          <table class="table">
            <thead>
              <th>Assignment</th>
              <th>Submission Deadline</th>
              @if(Auth::user()->roleid == 1)
	      <th>Download</th> 
              <th>Delete</th>
              @endif
            </thead>
            <tbody>
              @foreach($assignments as $ass)
              <tr>
                <td>{{ $ass->uploadassignment }}</td>
                <td>{{ $ass->submitby }}</td>
               @if(Auth::user()->roleid == 1)
		<td><a href="{{ asset('assignments') }}/{{$ass->uploadassignment}}" download>Download</a></td>
                <td><a href="{{ url('deleteass') }}/{{$ass->id}}">Delete</a></td>
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




        </div>
     </div>
               
            </div>


            </div>
        </div>
 @include('layouts.adminfooter')
@endsection

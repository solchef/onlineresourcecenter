
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

</div><div class="row">

        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add Faculties</h5>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="createfaculty">
                {{ csrf_field() }}

                 <div class="form-group">
                        <label for="exampleInputEmail1">Select Campus</label>
                         <select class="form-control" name="campus" required>
                             <option value="">Select Campus</option>
                             @foreach($cam as $camp)
                             <option value="{{$camp->id}}">{{$camp->campusname}}</option>
                             @endforeach
                         </select>
                                                
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Code</label>
                         <input type="text" name="faculty_code" class="form-control" id="message" placeholder="Type faculty code" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Name</label>
                         <input type="text" name="faculty_name" class="form-control" id="message" placeholder="Type faculty name" required>
                       
                    </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea type="" name="description" class="form-control" id="message" placeholder="Type description of the faculty" required>
                        </textarea>
                    </div>
                 
                  
                    <button type="Add" class="btn btn-default">Submit</button>
                    
                </form>
</div>
</div>
</div>

      
    <!--/span-->

     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Existing Faculties</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <th>Faculty Name</th>
                 <th>Faculty Code</th>
                
                 <!-- <th>View Courses</th> -->
                 <th>Edit</th>
                 <th>Delete</th>
                
                 <tbody>
                     @foreach($fac as $facs)
                     <tr>
                         <td>{{$facs->faculty_code}}</td>
                         <td>{{$facs->faculty_name}}</td>

                        <!--  <td><a href="{{url('editfaculty')}}/{{$facs->id}}"><button class="btn btn-xs btn-success col-md-12">View</button></a></td> -->
                         <td><a href="{{url('editfaculty')}}/{{$facs->id}}"><button class="btn btn-xs btn-success col-md-12">Edit</button></a></td>
                         <td><a href="{{url('deletefaculty')}}/{{$facs->id}}"><button class="btn btn-xs btn-success col-md-12">Delete</button></a></td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
               
        </div>
 
    </div>

</div>
</div>




    @include('layouts.adminfooter')
@endsection


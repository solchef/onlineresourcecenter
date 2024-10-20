
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

</div><div class="row">

        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Edit Faculty</h5>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="{{ url('updatefaculty')}}/{{$fac->id}}">
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
                         <input type="text" name="faculty_code" class="form-control" id="message" value="{{$fac->faculty_code}}" placeholder="Type faculty code" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Name</label>
                         <input type="text" name="faculty_name" class="form-control" id="message" value="{{$fac->faculty_name }}" placeholder="Type faculty name" required>
                       
                    </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea type="" name="description" class="form-control" id="message"  placeholder="Type description of the faculty" required> {{$fac->description}}
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
            <h5>Faculty Details</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <th>Faculty Name</th>
                 <th>Faculty Code</th>
                
        
                
                 <tbody>
                     
                     <tr>
                         <td>{{$fac->faculty_code}}</td>
                         <td>{{$fac->faculty_name}}</td>

                     
                     </tr>
               
                 </tbody>
             </table>
               
        </div>
 
    </div>

</div>
</div>




    @include('layouts.adminfooter')
@endsection


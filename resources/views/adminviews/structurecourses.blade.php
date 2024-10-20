
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Fees Payable By Student</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <th>Course Code</th>
                 <th>Course Name</th>
                 <th>Category</th>
                 <th>Course Profile</th>

          
  
             
              <tbody>
                @foreach($courses as $course)
              
                     <tr>
                         <td>{{$course->course_code}}</td>
                         <td>{{$course->course_name}}</td>
                         <td>{{$course->faculty_name}}</td>
                         <td><a href="generatefeestructure/{{$course->id}}" ><button class="btn btn-xs btn-primary col-md-12">Generate Structure</button></a></td>
                
                      
                     </tr>
                   
                     @endforeach
                 </tbody>
                
             </table>
             
               <nav>{{ $courses->links() }}</nav>
        </div>
 
    </div>

</div>
</div>
</div>

    @include('layouts.adminfooter')
@endsection


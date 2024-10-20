
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Genetate Student Statements</h5>
            <a href="exportdata" class="btn btn-primary btn-sm pull-right">Export Students List to Excel</a>
        </div>
        <div class="ibox-content">
           <h4>Institution Criteria</h4>
        <form method="get" action="studentstatements">
            @if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 4)
            <div class="col-md-3 pull-left">
                <label>Filter By Campus</label>
                <select class="form-control" name="campus">
                    <option value="">Select Campus</option>
                    @foreach($campuses as $camp)
                        <option value="{{$camp->id}}">{{$camp->campusname}}</option>
                    @endforeach
                </select>
            </div>
            @endif
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
        <br>
           <h4>Students Criteria</h4>
      <form method="get" action="studentstatements">

             <div class="col-md-3 pull-left">
                <label>Enter Student Name</label>
              <input type="text" name="student" class="form-control">
            </div>


             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>
        </form>
        <div class="row">
          <div class="navigation col-md-12">{{ $users->links() }}</div>

    <table class="table table-responsive table-stripped table-bordered">
    <thead>
    <tr>
        <!-- <th>Student ID</th> -->
        <th>Student</th>
        <!-- <th>Mobile</th> -->
        <th>email</th>
        <th>Campus</th>
        <th>Course</th>
        <th>Fees Payable</th>
        <th>Fees Paid</th>
        <th>Balance</th>
        <th>Receive</th>
     @if(Auth::user()->roleid == 1)
        <th>View</th>
         <th>Edit</th>
          <th>Delete</th>
        <th>Account Status</th>
    @endif
    </tr>
    </thead>
    <tbody>
@foreach( $users as $user )
    <tr>
         <!-- <td class="">{{$user->id}}</td> -->
         <td class="">{{$user->name}}</td>
         <!-- <td class="">{{$user->mobile}}</td> -->
         <td class="">{{$user->email}}</td>
         <td class="">{{$user->campusname}}</td>
         <td class="">{{$user->course_name}}</td>
         <td>{{$user->payable}}</td>
         <td>{{$user->paid}}</td>
         <td class="">{{$user->balance}}</td>
          <td><a href="studentstatement/{{$user->id}}" ><button class="btn btn-xs btn-primary col-md-12">Previous Payments</button></a></td>
         @if(Auth::user()->roleid == 1)
        <td class="">
            <a class="" href="updateprofile/{{$user->id}}">
            
              <i class="fa fa-eye"></i>View
            </a> 
          </td>
            <td class="">
              <a class="" href="edituser/{{$user->id}}">
            
                <i class="fa fa-edit"></i>Edit
              </a>
           
          </td>
              <td class="">
              <a class="" href="deletestudent/{{$user->id}}">
            
                <i class="fa fa-remove"></i>Delete
            </a>
  
        </td>
        @if($user->status == 1)
        <td><a class="col-md-4" class="btn btn-danger btn-sm" href="deactivateaccount/{{$user->id}}">Deactivate</a></td>
        @else
        <td><a class="col-md-4" class="btn btn-success btn-sm" href="activateaccount/{{$user->id}}">Activate</a></td>
        @endif
        @endif
    </tr>
@endforeach

    </tbody>
    </table>

</div>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>




    @include('layouts.adminfooter')
@endsection


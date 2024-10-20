
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Newly Enrolled Students</h5>
            <!-- <a href="exportdata" class="btn btn-primary btn-sm pull-right">Export Students List to Excel</a> -->
        </div>
        <div class="ibox-content">
       
       
        <div class="row">
    

    <table class="table table-responsive table-stripped table-bordered">
    <thead>
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <!-- <th>Mobile</th> -->
        <th>email</th>
        <th>Campus</th>
        <th>Course</th>
        <th>Amount Paid</th>
        <th>Approve Student</th>
   
    </tr>
    </thead>
    <tbody>
@foreach( $users as $user )
    <tr>
         <td class="">{{$user->id}}</td>
         <td class="">{{$user->name}}</td>
         <!-- <td class="">{{$user->mobile}}</td> -->
         <td class="">{{$user->email}}</td>
         <td class="">{{$user->campusname}}</td>
         <td class="">{{$user->course_name}}</td>
         <td class="">{{$user->paid}}</td>
         <td class=""><a class="btn btn-primary btn-sm" href="approvestudent/{{$user->id}}"><i class="fa fa-check"></i> Approve</a></td>
        
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


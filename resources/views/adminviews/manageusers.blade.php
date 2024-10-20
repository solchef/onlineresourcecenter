
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Users</h5>
        </div>
        <div class="ibox-content">
                        <table class="table table-striped table-bordered  datatable responsive">
    <thead>
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach( $users as $user )
    <tr>
        <td class="center">{{$user->id}}</td>
        <td class="center">{{$user->name}}</td>
        <td class="center">{{$user->mobile}}</td>
         <td class="center">{{$user->email}}</td>
         <td class="center">{{$user->roleid}}</td>
       <td class="">
        <div class="row">
            <a class="col-md-4" href="updateprofile/{{$user->id}}">
            
              <i class="fa fa-eye"></i>View
            </a> 
              <a class="col-md-4" href="updateprofile/{{$user->id}}">
            
                <i class="fa fa-edit"></i>Edit
            </a>
              <a class="col-md-4" href="deletestudent/{{$user->id}}">
            
                <i class="fa fa-remove"></i>Delete
            </a>
      </div>
        </td>
    </tr>
@endforeach
    </tbody>
    </table>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>




    @include('layouts.adminfooter')
@endsection


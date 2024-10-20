
@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">
 <div class="row">
        <div class="col-lg-7 "  style="left: 200px;" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>New User(Admins and Staff) <small>Capture a new adminstrator details to add him/her to the system</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                   
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                                        <form role="form" method="post" action="{{ url('createadmin') }}">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Names</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter user Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile numbers" required>
                    </div>
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Select Campus</label>
                                    <select name="campusid" class="form-control" required>
                                       <option value="">Please select the Campus</option>
                                        @foreach($campuses as $camp)
                                        <option value="{{$camp->id}}">{{$camp->campusname}}</option>
                                    @endforeach
                                   </select>
                                </div>


        

                    <input type="hidden" name="roleid" value="1">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password(must contain at least one number)" required>
                    </div>
                   
    
                                               
                    <button type="submit" class="btn btn-success">Submit</button>
                    
                </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    
     @endsection
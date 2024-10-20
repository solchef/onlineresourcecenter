@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">



    <div class="row">
        <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>College Campuses Registration <small></small></h5>
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
                                        <form role="form" method="post" action="{{ url('updatecampus') }}/{{$campus->id}}">
                {{ csrf_field() }}
                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b"><u>Update Campus.</u></h3>
                            <p></p>

                   <div class="form-group">
                        <label for="exampleInputEmail1">Campus Name</label>
                        <input type="text" class="form-control" name="campusname" value="{{ $campus->campusname}}" id="campus" placeholder="Enter Campus Name" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" value="{{$campus->location}}" id="email" placeholder="Campus Location" required>
                           <span class="material-input"></span>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" id="mobile" value="{{$campus->address}}" placeholder="Campus Address" required>
                           <span class="material-input"></span>
                    </div>

 <button type="submit" class="btn btn-primary btn-block m-t-n-xs " style="margin-bottom: 0px;">Update Campus</button>
                   

                    </form>
    
                        </div>


                          
                                         
                  
                    
               
                    </div>
                </div>
        

        </div>



               
                  </div>
                                 <div class="col-sm-7 " >
                        
               <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Campus Details <small></small></h5>
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
                          <table class="table table-responsive table-stripped table-bordered">
                        <th>Campus ID</th>
                        <th>Campus Name</th>
                        <th>Campus Location</th>
                        <th>Campus Address</th>
                        
                        <tbody>
                          
                          <tr>
                          <td>{{$campus->id}}</td>
                          <td>{{$campus->campusname}}</td>
                          <td>{{$campus->location}}</td>
                          <td>{{$campus->address}}</td>
                        
                        </tr>
                          
                        </tbody>

                      </table>
                        </div>
            </div>

          </div>
        </div>
      
                  </div>   
                         
                      
          
    
@include('layouts.adminfooter')
@endsection

            
                   
    
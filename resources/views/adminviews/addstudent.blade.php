@extends('layouts.adminlayouts')
@include('layouts.usersfilter')
@section('content')
<div class="wrapper wrapper-content">



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>New User(Student) <small>Enroll a New Student to the E-Learning Platform</small></h5>
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
                <form role="form" method="post" action="{{ url('createstudent') }}">
                {{ csrf_field() }}
                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b"><u>Personal Details.</u></h3>
                            <p></p>

                            <div class="form-group">
                        <label for="exampleInputEmail1">Student Names</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter user Name" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                           <span class="material-input"></span>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile numbers" required>
                           <span class="material-input"></span>
                    </div>


                     <div class="form-group">
                        <label for="exampleInputEmail1">Occupation</label>
                        <input type="text" class="form-control" name="occupation" id="mobile" placeholder="Student Ocupation" required>
                           <span class="material-input"></span>
                    </div>


                     <div class="form-group">
                        <label for="exampleInputEmail1">Residence</label>
                        <input type="text" class="form-control" name="residence" id="mobile" placeholder="Student Residence" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payable Fees</label>
                        <input type="number" class="form-control" name="payable" id="payable" placeholder="Indicate the amount of fees to be paid by student" required>
                           <span class="material-input"></span>
                    </div>
    
                        </div>


                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b"><u>Institution Details.</u></h3>
                                 <div class="form-group">
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Campus Enrolled</label>
                                    <select name="campusid" class="form-control" required>
                                       <option value="">Please select the Campus</option>
                                    @foreach($campuses as $camp)
                                        <option value="{{$camp->id}}">{{$camp->campusname}}</option>
                                    @endforeach
                                   </select>
                                      <span class="material-input"></span>
                                </div>

                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Course Category</label>
                                    <select name="faculty" class="form-control" required id="coursecategory">
                                       <option value="">Please select the Category</option>
                                     
                                    <option value="1">Certificate</option>
                                    <option value="2">Diploma</option>
                                    <option value="3">Post Graduate</option>

                                
                                   </select>
                                      <span class="material-input"></span>
                                </div>

                                    <label for="exampleInputEmail1">Course Enrolled</label>
            
                              
                                 <select class="form-control" name="stdcourse" id="coursename" >
                                  
                                 </select>
                      
                                      <span class="material-input"></span>
                                </div>
                              
                                  <div class="form-group"><label>Commencement Date</label>
                                   <input type="date" class="form-control" name="commencement" placeholder="" class="form-control" required>
                                   <span class="material-input"></span>
                                  </div>


                                <div class="form-group"><label>Completion Date</label>
                                  <input type="date" class="form-control" name="completion" id="mobile" placeholder="" required>
                                    <span class="material-input"></span>
                                </div>

<!--                                   <div class="form-group" id="contractlabel"><label>Fees Paid</label>
                                  <input type="text" class="form-control" name="feespaid" id="commencement" placeholder="Key In Amount" required>
                                    <span class="material-input"></span>
                                </div> -->

                        </div>
                        <br><br>
                               <div class="col-sm-6 pull-right" >
                         <button type="submit" class="btn btn-primary btn-block m-t-n-xs " style="margin-bottom: 0px;">Enroll Student</button>
                           
                        </div>
                        </form>                  
                  
       
                    </div>
                </div>
            </div>
        </div>



                 
                     
                         
                      
                    </div>
                </div>


@include('layouts.adminfooter')

@endsection

            
                   
    
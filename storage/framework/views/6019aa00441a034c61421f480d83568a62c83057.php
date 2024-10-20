<?php echo $__env->make('layouts.usersfilter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Student Details<small></small></h5>
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
                <form role="form" method="post" action="<?php echo e(url('updatestudent')); ?>">
                <?php echo e(csrf_field()); ?>

                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b"><u>Personal Details.</u></h3>
                            <p></p>
                            <input type="hidden" name="userid" value="<?php echo e($user->id); ?>">
                            <div class="form-group">
                        <label for="exampleInputEmail1">Student Names</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo e($user->name); ?>" placeholder="Enter user Name" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo e($user->email); ?>" placeholder="Email address" required>
                           <span class="material-input"></span>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo e($user->mobile); ?>" placeholder="Mobile numbers" required>
                           <span class="material-input"></span>
                    </div>


                     <div class="form-group">
                        <label for="exampleInputEmail1">Occupation</label>
                        <input type="text" class="form-control" name="occupation" id="mobile" value="<?php echo e($user->occupation); ?>" placeholder="Student Ocupation" required>
                           <span class="material-input"></span>
                    </div>


                     <div class="form-group">
                        <label for="exampleInputEmail1">Residence</label>
                        <input type="text" class="form-control" name="residence" id="mobile" value="<?php echo e($user->residence); ?>" placeholder="Student Residence" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payable Fees</label>
                        <input type="number" class="form-control" name="payable" value="<?php echo e($user->payable); ?>" id="payable" placeholder="Indicate the amount of fees to be paid by student" required>
                           <span class="material-input"></span>
                    </div>
    
                        </div>


                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b"><u>Institution Details.</u></h3>
                                 <div class="form-group">
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Campus Enrolled</label>
                                    <select name="campusid" class="form-control" required>
                                       <option value="<?php echo e($user->campid); ?>"><?php echo e($user->campusname); ?></option>
                                    <?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $camp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($camp->id); ?>"><?php echo e($camp->campusname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                                      <span class="material-input"></span>
                                </div>

                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Course Category</label>
                                    <select name="faculty" class="form-control">
                                     
                                        <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->faculty_name); ?></option>
                                     <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <option value="<?php echo e($fac->id); ?>"><?php echo e($fac->faculty_name); ?></option>
                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                   </select>
                                      <span class="material-input"></span>
                                </div>

                                    <label for="exampleInputEmail1">Course Enrolled</label>
            
                              
                                 <select class="form-control" name="stdcourse" id="coursename" required>
                                  <option value="<?php echo e($user->course_id); ?>"><?php echo e($user->course_name); ?></option>
                                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($course->id); ?>"><?php echo e($course->course_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                      
                                      <span class="material-input"></span>
                                </div>
                                <?php ($dt = $user->coursestart); ?>
                                  <div class="form-group"><label>Commencement Date</label>
                                   <input type="date" class="form-control" name="commencement" value="<?php echo date('Y-m-d',strtotime($dt)); ?>" placeholder="" class="form-control" required>
                                   <span class="material-input"></span>
                                  </div>

                                  <?php ($en = $user->courseend); ?>
                                <div class="form-group"><label>Completion Date</label>
                                  <input type="date" class="form-control" name="completion" id="mobile" value="<?php echo date('Y-m-d',strtotime($en)); ?>" placeholder="" >
                                    <span class="material-input"></span>
                                </div>

                              <!--     <div class="form-group" id="contractlabel"><label>Fees Paid</label>
                                  <input type="text" class="form-control" name="feespaid" value="<?php echo e($user->feespaid); ?>"  id="commencement" placeholder="Key In Amount" >
                                    <span class="material-input"></span>
                                </div> -->

                        </div>
                        <br><br>
                               <div class="col-sm-6 pull-right" >
                         <button type="submit" class="btn btn-primary btn-block m-t-n-xs " style="margin-bottom: 0px;">Update Student</button>
                           
                        </div>
                        </form>  

                  <div class="row">
                    
                    <div class="col-md-6">
                      <h4>Reset user password</h4>
                            <form method="post" action="<?php echo e(url('updatestudentpass')); ?>/<?php echo e($user->id); ?>">
                              <?php echo e(csrf_field()); ?>

                              <div class="form-group">
                                <label>
                                  New Password
                                </label>
                                <input type="text" name="password" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-lg btn-danger">Update password</button>
                            </form>
                          </div>
                </div>
              </div>
                    </div>

                       
            </div>
        </div>



                 
                     
                         
                      
                    </div>
                </div>


<?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

            
                   
    
<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
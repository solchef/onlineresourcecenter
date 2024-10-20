<?php $__env->startSection('content'); ?>
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
                                        <form role="form" method="post" action="<?php echo e(url('postcampus')); ?>">
                <?php echo e(csrf_field()); ?>

                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b"><u>Campus Details.</u></h3>
                            <p></p>

                   <div class="form-group">
                        <label for="exampleInputEmail1">Campus Name</label>
                        <input type="text" class="form-control" name="campusname" id="campus" placeholder="Enter Campus Name" required>
                           <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" id="email" placeholder="Campus Location" required>
                           <span class="material-input"></span>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" id="mobile" placeholder="Campus Address" required>
                           <span class="material-input"></span>
                    </div>

 <button type="submit" class="btn btn-primary btn-block m-t-n-xs " style="margin-bottom: 0px;">Register Campus</button>
                   

                    </form>
    
                        </div>


                          
                                         
                  
                    
               
                    </div>
                </div>
        

        </div>



               
                  </div>
                                 <div class="col-sm-7 " >
                        
               <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Existing Campuses <small></small></h5>
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
                        <th>Edit</th>
                        <th>Delete</th>
                        <tbody>
                          <?php $__currentLoopData = $campus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                          <td><?php echo e($campo->id); ?></td>
                          <td><?php echo e($campo->campusname); ?></td>
                          <td><?php echo e($campo->location); ?></td>
                          <td><?php echo e($campo->address); ?></td>
                          <td><a href="<?php echo e(url('editcampus')); ?>/<?php echo e($campo->id); ?>"><button type="button" class="btn btn-success btn-xs col-sm-12">Edit</button></a></td>
                          <td><a href="<?php echo e(url('deletecampus')); ?>/<?php echo e($campo->id); ?>"><button type="button" class="btn btn-success btn-xs col-sm-12">Delete</button></a></td>
                        </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                      </table>
                        </div>
            </div>

          </div>
        </div>
      
                  </div>   
                         
                      
          
    
<?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

            
                   
    
<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
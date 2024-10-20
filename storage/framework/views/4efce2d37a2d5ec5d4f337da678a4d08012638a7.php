<?php $__env->startSection('content'); ?>
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
                                        <form role="form" method="post" action="<?php echo e(url('createadmin')); ?>">
                <?php echo e(csrf_field()); ?>

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
                                        <?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $camp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($camp->id); ?>"><?php echo e($camp->campusname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    
     <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
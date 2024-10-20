<?php $__env->startSection('content'); ?>
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
            <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 4): ?>
            <div class="col-md-3 pull-left">
                <label>Filter By Campus</label>
                <select class="form-control" name="campus">
                    <option value="">Select Campus</option>
                    <?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $camp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($camp->id); ?>"><?php echo e($camp->campusname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
             <div class="col-md-3 pull-left">
                <label>Filter By Faculty</label>
                <select class="form-control" name="faculty" id="coursefaculty">
                    <option value="">Select Faculty</option>
                     <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fac->id); ?>"><?php echo e($fac->faculty_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <div class="navigation col-md-12"><?php echo e($users->links()); ?></div>

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
     <?php if(Auth::user()->roleid == 1): ?>
        <th>View</th>
         <th>Edit</th>
          <th>Delete</th>
        <th>Account Status</th>
    <?php endif; ?>
    </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
         <!-- <td class=""><?php echo e($user->id); ?></td> -->
         <td class=""><?php echo e($user->name); ?></td>
         <!-- <td class=""><?php echo e($user->mobile); ?></td> -->
         <td class=""><?php echo e($user->email); ?></td>
         <td class=""><?php echo e($user->campusname); ?></td>
         <td class=""><?php echo e($user->course_name); ?></td>
         <td><?php echo e($user->payable); ?></td>
         <td><?php echo e($user->paid); ?></td>
         <td class=""><?php echo e($user->balance); ?></td>
          <td><a href="studentstatement/<?php echo e($user->id); ?>" ><button class="btn btn-xs btn-primary col-md-12">Previous Payments</button></a></td>
         <?php if(Auth::user()->roleid == 1): ?>
        <td class="">
            <a class="" href="updateprofile/<?php echo e($user->id); ?>">
            
              <i class="fa fa-eye"></i>View
            </a> 
          </td>
            <td class="">
              <a class="" href="edituser/<?php echo e($user->id); ?>">
            
                <i class="fa fa-edit"></i>Edit
              </a>
           
          </td>
              <td class="">
              <a class="" href="deletestudent/<?php echo e($user->id); ?>">
            
                <i class="fa fa-remove"></i>Delete
            </a>
  
        </td>
        <?php if($user->status == 1): ?>
        <td><a class="col-md-4" class="btn btn-danger btn-sm" href="deactivateaccount/<?php echo e($user->id); ?>">Deactivate</a></td>
        <?php else: ?>
        <td><a class="col-md-4" class="btn btn-success btn-sm" href="activateaccount/<?php echo e($user->id); ?>">Activate</a></td>
        <?php endif; ?>
        <?php endif; ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
    </table>

</div>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
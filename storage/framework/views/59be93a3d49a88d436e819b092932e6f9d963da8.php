<?php $__env->startSection('content'); ?>
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
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
         <td class=""><?php echo e($user->id); ?></td>
         <td class=""><?php echo e($user->name); ?></td>
         <!-- <td class=""><?php echo e($user->mobile); ?></td> -->
         <td class=""><?php echo e($user->email); ?></td>
         <td class=""><?php echo e($user->campusname); ?></td>
         <td class=""><?php echo e($user->course_name); ?></td>
         <td class=""><?php echo e($user->paid); ?></td>
         <td class=""><a class="btn btn-primary btn-sm" href="approvestudent/<?php echo e($user->id); ?>"><i class="fa fa-check"></i> Approve</a></td>
        
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
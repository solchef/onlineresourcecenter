<?php $__env->startSection('content'); ?>
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
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="center"><?php echo e($user->id); ?></td>
        <td class="center"><?php echo e($user->name); ?></td>
        <td class="center"><?php echo e($user->mobile); ?></td>
         <td class="center"><?php echo e($user->email); ?></td>
         <td class="center"><?php echo e($user->roleid); ?></td>
       <td class="">
        <div class="row">
            <a class="col-md-4" href="updateprofile/<?php echo e($user->id); ?>">
            
              <i class="fa fa-eye"></i>View
            </a> 
              <a class="col-md-4" href="updateprofile/<?php echo e($user->id); ?>">
            
                <i class="fa fa-edit"></i>Edit
            </a>
              <a class="col-md-4" href="deletestudent/<?php echo e($user->id); ?>">
            
                <i class="fa fa-remove"></i>Delete
            </a>
      </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
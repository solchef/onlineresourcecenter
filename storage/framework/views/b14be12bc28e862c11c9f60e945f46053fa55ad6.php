<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('My Submitted Assignments'); ?></h5>
        </div>
        <div class="ibox-content">
            
                <table class="table table-responsive table-stripped table-bordered">
                        <th><?php echo app('translator')->getFromJson('Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('FileName'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Submitted On'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Marked File'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Grade'); ?></th>
                        <tbody>
                <?php $__currentLoopData = $sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $others): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($others->submissionname); ?></td>
                <td><?php echo e($others->assfile); ?></td>
                <td><?php echo e($others->created_at); ?></td>
                  <?php if($others->status == 1): ?>
                <td><a href="<?php echo e(asset('assi')); ?>/<?php echo e($others->assfile); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Received'); ?></i></button></a></td>
                <td><a href="<?php echo e(asset('reverts')); ?>/<?php echo e($others->revertfile); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Marked File'); ?></i></button></a></td>
                <td><?php echo e($others->grade); ?></td>
                <?php else: ?>

                <td>
                <a href="<?php echo e(asset('assi')); ?>/<?php echo e($others->assfile); ?>" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Pending'); ?></i></button></a>
                </td>
                <td><a href="#" ><button class="btn btn-xs btn-primary col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Un-Assessed'); ?></i></button></a></td>
                <td><?php echo app('translator')->getFromJson('Pending'); ?></td>
                <?php endif; ?>
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
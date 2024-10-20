<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('Submit Assignment'); ?></h5>
        </div>
        <div class="ibox-content">
            <?php if(!$checkifsubmitted): ?>

           
        <h5><?php echo e($assignments->uploadassignment); ?>

               <hr>
             <form role="form" method="post" action="<?php echo e(url('createassignment')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="assignmentid" value="<?php echo e($assignments->id); ?>">

                 <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('Submission Name'); ?></label>
                         <input type="text" name="submisionname" class="form-control" required >
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('Upload files'); ?></label>
                         <input type="file" name="assignment" class="form-control" multiple required>
                       
                    </div>

                    <button type="Submit" class="btn btn-default"><?php echo app('translator')->getFromJson('Submit'); ?></button>
                    
                </form>


            <?php else: ?>
            <p> You have already submitted  <?php echo e($assignments->uploadassignment); ?> Your previous submission will be replaced by this submission.</p>

                       <form role="form" method="post" action="<?php echo e(url('updatesubmission')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($assignments->id); ?>">

                 <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('Submission Name'); ?></label>
                         <input type="text" name="submisionname" class="form-control" required >
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('Upload files'); ?></label>
                         <input type="file" name="assignment" class="form-control" multiple required>
                       
                    </div>

                    <button type="Submit" class="btn btn-default"><?php echo app('translator')->getFromJson('Submit'); ?></button>
                    
                </form>


                <?php endif; ?>
        </div>
 
    </div>

</div>

     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('Previous Submissions'); ?></h5>
        </div>
        <div class="ibox-content">
            
                <table class="table table-responsive table-stripped table-bordered">
                        <th><?php echo app('translator')->getFromJson('Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('FileName'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Submitted On'); ?></th>
                        <th><?php echo app('translator')->getFromJson('Status'); ?></th>
                        <tbody>
                <?php $__currentLoopData = $othersubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $others): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($others->submissionname); ?></td>
                <td><?php echo e($others->assfile); ?></td>
                <td><?php echo e($others->created_at); ?></td>
                  <?php if($others->status == 1): ?>
                <td><a href="<?php echo e(asset('assi')); ?>/<?php echo e($others->assfile); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Received'); ?></i></button></a></td>
                <?php else: ?>
                <td>
                <a href="<?php echo e(asset('assi')); ?>/<?php echo e($others->assfile); ?>" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Pending'); ?></i></button></a>
                </td>
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
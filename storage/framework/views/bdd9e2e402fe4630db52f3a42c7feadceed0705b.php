<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

    <div class="row">    
     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('Course Assignments'); ?></h5>
        </div>

        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
              
                <th><?php echo app('translator')->getFromJson('Assignment'); ?></th>
                
                  <th><?php echo app('translator')->getFromJson('Download'); ?></th>
                  <th><?php echo app('translator')->getFromJson('Submit'); ?></th>
              
     
               
  

             <tbody>
                     <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        
                         <td><?php echo e($ass->uploadassignment); ?></td>
                         
                    
                         <td><a href="<?php echo e(asset('assignments')); ?>/<?php echo e($ass->uploadassignment); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> <?php echo app('translator')->getFromJson('Download'); ?></i></button></a> </td>
                         <?php if($today < $ass->submitby): ?>
                         <td><a href="<?php echo e(url('submitassignment')); ?>/<?php echo e($ass->id); ?>" ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-code-fork"> <?php echo app('translator')->getFromJson('Submit'); ?></i></button></a></td> 
                        <?php else: ?>

                        <td><a href="<?php echo e(url('submitassignment')); ?>/<?php echo e($ass->id); ?>" ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-code-fork"> <?php echo app('translator')->getFromJson('Submit'); ?></i></button></a></td>
              <!--               <td>
                            <button id="<?php echo e($ass->id); ?>" class="btn btn-xs btn-danger col-md-12" data-toggle="modal" data-target="#myModalActivate">Expired</button>
                            </td> -->
                        <?php endif; ?>
                       
                        
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
             </table>
            
               <nav><?php echo e($assignments->links()); ?></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-exclamation modal-icon"></i>
                    <h4 class="modal-title">OOPS</h4>
                    <h5><?php echo app('translator')->getFromJson('Assignment Submission Deadline Has Expired'); ?></h5>
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body recordId" hidden >
                            
                        </div>

                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-blue pull-right" data-dismiss="modal">Okey</button>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
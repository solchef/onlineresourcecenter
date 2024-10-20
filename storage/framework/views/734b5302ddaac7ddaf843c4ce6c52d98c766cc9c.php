<?php $__env->startSection('content'); ?>


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="wrapper wrapper-content animated fadeInRight">
                                    
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                          <div class="row">
                            <form action="<?php echo e(('createnotification')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                            <h4>Enter Notification below:</h4>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <textarea class="form-control" name="notification" rows="8">
                                        
                                    </textarea>
                                </div>
                                <button class="btn btn-success btm-sm pull-right">Add +</button>
                            </div>

                            </form>
                            </div>
                        <div class="table-responsive">
                          <h4>View Notifications</h4>
                    
                    <table class="table" >
                    <thead>
                        <th>#</th>
                        <th>Date</th>
                    
                        <th>Delete</th>  
                    </thead>
                    <tbody>
                        <?php ($count = 1); ?>

                        <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($count); ?></td>
                            <td><?php echo e($not->notification); ?></td>
                            <td><a href="<?php echo e(url('deletenotification')); ?>/<?php echo e($not->id); ?>" class="btn btn-sm btn-default">Delete Notification</a></td>
                        </tr>
                        <?php ($count++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                    </tbody>
         
                    </table>
                    <nav class="navigation"></nav>
                        </div>

                    </div>
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
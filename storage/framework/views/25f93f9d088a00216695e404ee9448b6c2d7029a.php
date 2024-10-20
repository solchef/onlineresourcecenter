<?php $__env->startSection('content'); ?>


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                    <div class="row">
                        <div class="row">
                  
                <div class="col-md-12">

                      <h4 class="m-t-none m-b">1. Add Student Schedules</h4>
                       <form action="<?php echo e(url('createschedule')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="studentid" value="<?php echo e($student); ?>">
                    <div class="col-md-2">
                       
                        <div class="form-group">
                        <label class=""><strong>Schedule Due Date</strong></label>

                        <input type="date" name="start" class="form-control col-md-12" required>

                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                        <label class=""><strong>Schedule Type</strong></label>

                           <select name="type" class="form-control">
                               <option value="">Select Type</option>
                               <option value="1">Assignments</option>
                               <option value="2">Exam</option>
                               <option value="3">Other</option>
                           </select>

                        </div>
                    </div>


                     <div class="col-md-2">
                        <div class="form-group">
                        <label class=""><strong>Description</strong></label>

                        <input type="text" class="form-control col-md-12" name="description" required>

                        </div>
                    </div>

                    <div class="col-md-2" style="margin-top: 20px;">
                <button class="btn btn-primary btn-lgpull-right">Add Schedule</button>
            </div>
        </form>

            </div>
             

           </div>
                <br>
                
                    <div class="row">
                        <div class="col-md-12">
                     <h4>2. Student Schedules:
                            
                     </h4>
                             <div class="table-responsive">
                                <table class="table" id="tablerecipients">
                                    <thead>
 
                                        <th>Schedule Date</th>
                                        <th>Schedule Type</th>     
                                        <th>Description</th>
                                        <th>Delete</th>
                                
                                    </thead>
                                    <tbody>
                               <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($sch->start); ?></td>
                                      <?php if($sch->type == 1): ?>
                                      <td>Assignment</td>
                                      <?php else: ?>
                                      <td>Other</td>
                                      <?php endif; ?>
                                      <td><?php echo e($sch->description); ?></td>
                                      <td><a href="<?php echo e(url('deleteschedule')); ?>/<?php echo e($sch->id); ?>" class="btn btn-xs btn-danger">Delete</a></td>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                              
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
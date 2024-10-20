<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Students Perfomance</h5>
        </div>

        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Student</th>
                 <th>Email</th>
                 <th>Assignment/Exam</th>
                 <th>Score</th>
                 <!-- <th>History</th> -->

                     
              <tbody>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                     <tr>
                         <td><?php echo e($payment->name); ?></td>
                         <td><?php echo e($payment->uploadassignment); ?></td>
                         <td><?php echo e($payment->submissionname); ?></td>
                         <td><?php echo e($payment->grade); ?></td>
                         
                
                      
                     </tr>
                   
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
                
             </table>
             
               <nav></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Students Balances</h5>
        </div>
             <h4>Filter Criteria</h4>
      <form method="get" action="viewbalances">

             <div class="col-md-3 pull-left">
                <label>Filter By Student Name</label>
              <input type="text" name="student" class="form-control">
            </div>


             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>
        </form>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>ID</th> -->
                 <th>Student</th>
                 <th>Email</th>
                 <th>Paid</th>
                 <th>Balance</th>
                 <th>History</th>

                     
              <tbody>
                <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                     <tr>
                         <!-- <td><?php echo e($payment->id); ?></td> -->
                         <td><?php echo e($payment->name); ?></td>
                         <td><?php echo e($payment->email); ?></td>
                         <td><?php echo e($payment->paid); ?></td>
                         <td><?php echo e($payment->balance); ?></td>
                         <td><a href="studentstatement/<?php echo e($payment->id); ?>" ><button class="btn btn-xs btn-primary col-md-12">Previous Payments</button></a></td>
                
                      
                     </tr>
                   
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
                
             </table>
             
               <nav><?php echo e($balances->links()); ?></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
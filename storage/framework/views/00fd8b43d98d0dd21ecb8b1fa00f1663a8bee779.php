<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Payments Made</h5>
        </div>

     <h4>Filter Criteria</h4>
      <form method="get" action="viewpayments">

             <div class="col-md-3 pull-left">
                <label>Filter By Student Name</label>
              <input type="text" name="student" class="form-control">
            </div>

            <div class="col-md-3 pull-left">
                <label>Start Date</label>
              <input type="date" name="startdate" class="form-control">
            </div>

            <div class="col-md-3 pull-left">
                <label>End Date</label>
              <input type="date" name="enddate" class="form-control">
            </div>

             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>
        </form>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <!-- <th>Payment ID</th> -->
                 <th>Student</th>
                 <th>Email</th>
                 <th>Pay Date</th>
                 <th>Means</th>
                 <th>Trans Code</th>
                 <th>Amount</th>
                 <th>Received By</th>
                 <th>Created_at</th>
                 <th>Approve</th>

                     
              <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                     <tr>
                         <!-- <td><?php echo e($payment->id); ?></td> -->
                         <td><?php echo e($payment->name); ?></td>
                         <td><?php echo e($payment->email); ?></td>
                         <td><?php echo e($payment->paydate); ?></td>
                         <td><?php echo e($payment->means); ?></td>
                         <td><?php echo e($payment->transcode); ?></td>
                         <td><?php echo e($payment->amount); ?></td>
                         <td><?php echo e($payment->empname); ?></td>
                         <td><?php echo e($payment->created_at); ?></td>
                         <td><a href="approvepayment/<?php echo e($payment->id); ?>" ><button class="btn btn-xs btn-success col-md-12">Approve Payment</button></a></td>
                
                      
                     </tr>
                   
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
                
             </table>
             
               <nav><?php echo e($payments->links()); ?></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
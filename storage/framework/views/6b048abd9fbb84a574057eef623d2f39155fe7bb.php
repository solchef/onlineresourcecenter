<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add a New Payment</h5>
        </div>
        <div class="ibox-content">
 <form role="form" method="post" action="<?php echo e(url('enterfee')); ?>/<?php echo e($student->id); ?>">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Means</label>
                         <select name="means" class="form-control">
                           <option value="">Select Means</option>
                           <option value="Bank Transfer">Bank Transfer</option>
                           <option value="Cheque">Cheque</option>
                           <option value="Mobile Money">Mobile Money</option>
                           <option value="Online Invoice">Online Invoice</option>
                         </select>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Transaction Code</label>
                         <input type="text" name="transcode" class="form-control" id="message"  required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Date</label>
                         <input type="date" name="date" class="form-control" id="message"  required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount</label>
                         <input type="text" name="amount" class="form-control" id="message"  required>
                       
                    </div>
                    <input type="hidden" name="balance" value="">
                  
                    <button type="Add" class="btn btn-default">Submit</button>
                    
               </form>
            </div>
         </div>
    </div>


     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Previous Payments</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                <th>#</th>
                 <th>Date</th>
                 <th>Means</th>
                 <th>Tansaction Code</th>
                 <th>Amount</th>
                 <th>Delete</th>


             <tbody>
             <?php if(!$statement): ?>
                <tr>
                  <p>No Fees has been received for this student</p>
                </tr>
                <?php else: ?>
              <?php
              $index=0;
              $total_amount = 0;
               ?>
                <?php ($count = 1); ?>
          
              <?php $__currentLoopData = $statement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statements): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($count); ?></td>
                  <td><?php echo e($statements->created_at); ?></td>
                  <td><?php echo e($statements->means); ?></td>
                  <td><?php echo e($statements->transcode); ?></td>
                  <td><?php echo e($statements->amount); ?></td>
                  <td><a class="btn btn-success btn-xs" href="<?php echo e(url('deletepayment')); ?>/<?php echo e($statements->id); ?>">Delete Payment</a> </td>

              </tr>
                    <?php $index++;
                    $total_amount+=$statements->amount;
                   ?>
           
              <?php ($count ++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

                 <tr>

              <td colspan="3">
         Total Paid: <?php echo e($total_amount); ?>

                 </td>
               </tr>
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
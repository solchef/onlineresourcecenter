<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">


      
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Student Fee Statement</h5>

             

                    <div class="title-action pull-right">
                       
                        <a href="#" id="myBtn" onclick="printDiv('printreport')" class="btn btn-primary"><i class="fa fa-print"></i> Print Statement </a>
                    </div>
            
        </div>
  <div id="printreport">
        <div class="ibox-content">
          <center><h2>ONLINE RESOURCE CENTER</h2>
                  <h4>Fee Payment Statement</h4>
          </center>
             <table class="table table-responsive table-stripped table-bordered">
                <th>#</th>
                 <th>Date</th>
                 <th>Payment Means</th>
                 <th>Transaction Code</th>
                 <th>Amount</th>
                 <!-- <th>Balance</th> -->
                 
  

                   <tbody>
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
                  <!-- <td><?php echo e($statements->amount - $total_amount); ?></td> -->
              </tr>
                    <?php $index++;
                    $total_amount+=$statements->amount;
                   ?>
           
              <?php ($count ++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 <tr>

              <td colspan="3">
         Total Paid: <?php echo e($amount); ?>   <br><br>  Balance: <?php echo e($balance); ?>

                 </td>
               </tr>
                 </tbody>
             </table>
             <nav></nav>
               
        </div>
      </div>
 
    </div>

      <?php if(Auth::user()->roleid == 3): ?>
       <div class="title-action pull-left">
                       
          <a href="http://localhost/payments/public/payment/2b9ce85e2e7386a2efd99235c9d3b7/14a00ce249d405d38c07cf6a47972e/1000" target="_blank"  class="btn btn-primary"><i class="fa fa-print"></i> Make Payment </a>
        </div>

        <?php elseif(Auth::user()->roleid == 4): ?>

          <div class="title-action pull-left">
                       
          <a href="<?php echo e(url('receivefees')); ?>/<?php echo e($student->id); ?>" class="btn btn-primary"><i class="fa fa-book"></i> Receive Fees </a>
            </div>

        <?php endif; ?>
</div>
</div>
</div>

    <script type="text/javascript">
          function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
    </script>




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
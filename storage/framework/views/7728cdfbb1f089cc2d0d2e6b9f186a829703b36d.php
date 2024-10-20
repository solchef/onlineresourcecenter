<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

            <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>View Raised Tickets</h5>
        </div>
        <div class="ibox-content">
               <nav class="navigation"><?php echo e($tickets->links()); ?></nav>

                    <div class="wrapper wrapper-content animated fadeInRight">

                
                 <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="faq-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <a data-toggle="collapse" href="#<?php echo e($reff->id); ?>" class="faq-question"><?php echo e($reff->id); ?>.<?php echo e($reff->description); ?></a>
                                    <small>Raised by <strong><?php echo e($reff->name); ?> : <?php echo e($reff->email); ?></strong> <i class="fa fa-clock-o"></i> <?php echo e($reff->created_at); ?></small>
                                </div>
                                <div class="col-md-2">
                                    <span class="small font-bold"><?php echo e($reff->type); ?></span>
  
                                    <div class="tag-list">
                                         <?php if($reff->status == "Received"): ?>
                                         <span class="tag-item">Replied</span>
                                       
                                        <?php else: ?>
                                          <span class=""><a href="<?php echo e(url('replyticket')); ?>/<?php echo e($reff->id); ?>" class="btn btn-xs btn-primary">Reply</a></span>
                                        <?php endif; ?>

                                        <span class=""><a href="<?php echo e(url('viewhistory')); ?>/<?php echo e($reff->userid); ?>" class="btn btn-xs btn-warning">View History</a></span>
                                    </div>
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="<?php echo e($reff->id); ?>" class="panel-collapse collapse ">
                                        <div class="faq-answer">
                                            <p>
                                                <?php echo e($reff->reply); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     

                 
                    </div>
                </div>
            </div>


 
</div>
</div>
</div>

      
    <!--/span-->

     




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
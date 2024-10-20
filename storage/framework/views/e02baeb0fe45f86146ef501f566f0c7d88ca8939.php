<?php $__env->startSection('content'); ?>


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-12 ">
                    <div class="ibox float-e-margins">
                   
                  <div class="col-lg-12">

                    <div class="col-lg-12" ">
                        <div class="ibox float-e-margins">

                            <div class="ibox-title">
                               <h3><strong><u><i class="fa fa-envelope"></i> Student Tickets </u> </strong></h3>
        
                            </div>
                            <div class="ibox-content" >
                                <div class="row" id="messages" style="height: 400px;  overflow: scroll;">
                              
                               <div style="" class=" alert alert-success col-md-9">
                                 <p>Raised Tickets by the student will appear here<br>
                                   
                                   
                             </div>

                             
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tick): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                            <div style="" class="pull-right alert alert-warning col-md-8 col-md-offset-1">
                                 <p><?php echo e($tick->description); ?> <br>
                                    <span style="color: grey;"><?php echo e($tick->created_at); ?></span></p>
                                   
                             </div>
                       <?php if(!$tick->reply): ?>

                       <?php else: ?>
                               <div class="alert alert-danger col-md-8">
                                  <p><?php echo e($tick->reply); ?> <br>
                                    <span style="color: grey;"><?php echo e($tick->created_at); ?> - ORC Support</span></p>
                                     
                             </div>
                        <?php endif; ?>

                             
                             
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                        
                                  
                                
                                </div>
                                </div>
                                <form method="post" action="<?php echo e(url('postreply')); ?>">
                                  <?php echo e(csrf_field()); ?>

                                   <input type="hidden" name="id" value="<?php echo e($lastticket); ?>"> 
                                   <input type="hidden" name="ticketuser" value="<?php echo e($ticketuser); ?>">
                                <div class="form-group">
                                  <label>Type a Reply</label>
                                <textarea class="form-control" name="reply" autofocus placeholder="Type a Reply">
                                    
                                  </textarea>
                                </div>
                                  <br>
                                <a href="<?php echo e(url('#')); ?>" class="btn btn-success btn-sm">Refresh</a>
                                 <button type="submit" href="#" class="btn btn-primary btn-sm pull-right">Send Resply</button>
                               </form>
                            </div>

                </div>
                </div>

                 
                </div>
            </div>
            </div>
        </div>

        
         <script type="text/javascript">
          $('#messages').scrollTop($('#messages')[0].scrollHeight);
        </script>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
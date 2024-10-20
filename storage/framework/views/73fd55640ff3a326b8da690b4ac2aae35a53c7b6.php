<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tickey Reply</h2>
             
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo e(url('support')); ?>" class="btn btn-sm btn-primary">Back To Support</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                   
                  <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Ticket Reply</a></li>
                            <!-- <li class=""><a data-toggle="tab" href="#tab-2">Other Tickets By User</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   
                                   <div class="form-group col-md-12">
                                    <label class="control-label"><u>Ticket Description</u></label>
                                       <p><b>Ticket Type: </b> <?php echo e($ticket->type); ?> <br>
                                       <b> Ticket By: </b><?php echo e($ticket->name); ?> <br>
                                       <b> Mobile: </b> <?php echo e($ticket->mobile); ?> <br>
                                       <b> Email: </b> <?php echo e($ticket->email); ?> <br>
                                        <b>Description:</b> <?php echo e($ticket->description); ?></p>
                                   </div>
                                   <input type="hidden" name="id" value="<?php echo e($ticket->id); ?>">  

                                      <div class="form-group col-md-12">
                                    <label class="control-label">Ticket Reply</label>
                                       <textarea class="form-control" disabled  name="#" rows="8"><?php echo e($ticket->reply); ?></textarea>
                                   </div>
                                   <div class="form-group">
                      
                               </div>
                            
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                

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
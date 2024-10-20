<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Reply to Raised Ticket</h2>
             
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo e(url('viewtickets')); ?>" class="btn btn-sm btn-primary">Back To Tickets</a>
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
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Raised Tickets</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Other Tickets By User</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Please Post your Reply to the ticket here.</strong>
                                        <hr>
                                        <form method="post" action="<?php echo e(url ('postreply')); ?>">
                                          <?php echo e(csrf_Field()); ?>

                    

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
                                    <label class="control-label">Send Reply</label>
                                       <textarea class="form-control"  name="reply" rows="8"></textarea>
                                   </div>
                                   <div class="form-group">
                                   <button type="submit" class="btn btn-primary btn-lg">
                                       Reply Ticket
                                   </button>
                               </div>
                             </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Other Tickets By User</strong>
                    <table class="table">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Ticket Type</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tick): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tick->id); ?></td>
                                <td><?php echo e($tick->type); ?></td>
                                <td><?php echo e($tick->description); ?></td>
                                <td> <label class="btn btn-clear btn-xs"><?php echo e($tick->status); ?></label> </td>
                            </tr>
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
        </div>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
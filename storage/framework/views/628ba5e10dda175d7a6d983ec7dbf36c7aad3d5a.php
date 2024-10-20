<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('View Library References'); ?></h5>
        </div>
        <div class="ibox-content">
        <form method="get" action="viewreferences">
            <div class="col-md-3 pull-left">
                <label><?php echo app('translator')->getFromJson('Filter By Target Group'); ?></label>
                <select class="form-control" name="type">
                    <option value=""><?php echo app('translator')->getFromJson('Select Reference Type'); ?></option>
                 <option value="1"><?php echo app('translator')->getFromJson('Videos'); ?></option>
                <option value="2"><?php echo app('translator')->getFromJson('Books'); ?></option>
                <option value="3"><?php echo app('translator')->getFromJson('PastPapers'); ?></option>
                <option value="4"><?php echo app('translator')->getFromJson('Past Project Papers'); ?></option>
                </select>
            </div>
            <?php if(Auth::user()->roleid == 1): ?>
             <div class="col-md-3 pull-left">
                <label><?php echo app('translator')->getFromJson('Filter By Target Group'); ?></label>
                <select class="form-control" name="target">
                    <option value=""><?php echo app('translator')->getFromJson('Select Reference Type'); ?></option>
                  <?php $__currentLoopData = $target; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($tar->id); ?>"><?php echo e($tar->course_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
            
             <div class="col-md-2">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg"><?php echo app('translator')->getFromJson('Filter Data'); ?></button>
                
            </div>
        </form>
     <table class="table table-responsive table-stripped table-bordered">
    <thead>
    <tr>
        <th><?php echo app('translator')->getFromJson('Reference Type'); ?></th>
        <th><?php echo app('translator')->getFromJson('Reference Name'); ?></th>
        <!-- <th>Link</th> -->
        <th><?php echo app('translator')->getFromJson('View'); ?></th>
   
        <th><?php echo app('translator')->getFromJson('Play'); ?></th>
        

     <?php if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2): ?>
        <th><?php echo app('translator')->getFromJson('Delete'); ?></th>
    <?php endif; ?> 
    </tr>
    <tbody>
       <?php $__currentLoopData = $ref; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php if($reff->referencetype == 1): ?>
            <td><?php echo app('translator')->getFromJson('Videos'); ?></td>
            <?php elseif($reff->referencetype == 2): ?>
            <td><?php echo app('translator')->getFromJson('Books'); ?></td>
            <?php elseif($reff->referencetype == 3): ?>
            <td><?php echo app('translator')->getFromJson('Past Papers'); ?></td>
            <?php elseif($reff->referencetype == 4): ?>
            <td><?php echo app('translator')->getFromJson('Past project Papers'); ?></td>
            <?php endif; ?>

            <td><?php echo e($reff->reference_name); ?></td>
    
            <!-- <td><?php echo e($reff->referencelink); ?></td> -->
             <td>  <a href="<?php echo e(asset('references')); ?>/<?php echo e($reff->details); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> </i><?php echo app('translator')->getFromJson('Download'); ?></button></a></td>
             <!--  <?php if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2): ?>
            <td><a href="deletereference/<?php echo e($reff->id); ?>"><button class="btn btn-danger btn-sm red-bg col-md-12">Delete</button></a></td>
             <?php endif; ?> -->

             <?php if($reff->referencetype == 1): ?>
             <td><button class="btn btn-default manage-user" type="button" data-toggle="modal" data-target="manageuser" value="<?php echo e(asset('references')); ?>/<?php echo e($reff->details); ?>"><?php echo app('translator')->getFromJson('Play Video'); ?></button></td>
             <?php else: ?>
            <td> <label><?php echo app('translator')->getFromJson('No Action'); ?></label> </td>
             <?php endif; ?>
	<?php if(Auth::user()->roleid == 1 OR Auth::user()->role_id == 2): ?>
	 <td><a href="deletereference/<?php echo e($reff->id); ?>"><button class="btn btn-danger btn-sm red-bg col-md-12"><?php echo app('translator')->getFromJson('Delete'); ?></button></a></td>
	<?php endif; ?>
           
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </thead>
    <tbody>

    </tbody>
    </table>
</div>
</div>
</div>

      
    <!--/span-->

     
</div>
</div>

    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
                    <h4 class="modal-title">Reference Details</h4>
                
                </div>
                <div class="modal-body">
                    <form action="activateuser" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body recordId" hidden >
                            
                        </div>
                        <?php if(empty($reff)): ?>
                        <p>Blank</p>
                        <?php else: ?>
                        <p><strong>
                            <h4><u>Reference Name</u></h4><br>
                            <?php echo e($reff->reference_name); ?>

                            <hr>
                            <h4><u>Reference Link</u></h4>
                            <a href="<?php echo e($reff->referencelink); ?>"><?php echo e($reff->referencelink); ?></a>
                            <hr>
                            <h4><u>Reference Details</u></h4>
                            <?php echo e($reff->details); ?>

                        </strong></p>
                        <?php endif; ?>

                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                          
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


                                <div class="modal inmodal" id="manageuser" tabindex="-1" style="margin-top: 50px;" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
<video width="720" height="405" controls  poster="">
    <source  src="" type="video/mp4" id="delete-user">

    Your browser does not support the video tag or the file format of this video.
</video>        
                                    </div>
                                </div>
                             </div>


    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
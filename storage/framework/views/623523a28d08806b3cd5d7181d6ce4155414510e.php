<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add a New Document</h5>
        </div>
        <div class="ibox-content">
 <form role="form" method="post" action="<?php echo e(url('posttrascripts')); ?>/<?php echo e($student); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Document Type</label>
                         <select name="type" class="form-control">
                           <option value="">Select Document</option>
                           <option value="1">Transcript</option>
                           <option value="2">Certificate</option>
      
                         </select>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Document Name</label>
                         <input type="text" name="name" class="form-control" id="message"  required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Document File</label>
                         <input type="file" name="filename" class="form-control" id="message"  required>
                       
                    </div>


    
                  
                    <button type="Add" class="btn btn-default">Submit</button>
                    
               </form>
            </div>
         </div>
    </div>


     <div class="col-lg-8">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Uploaded Transcripts and Certificates</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                <!-- <th>#</th> -->
                 <th>Upload Date</th>
                 <th>Document Type</th>
                 <th>Document Name</th>
                 <th>File Name</th>
                 <th>Download</th>
                 <th>Delete</th>

                 <tbody>
                   <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                     <td><?php echo e($doc->created_at); ?></td>
                     <?php if($doc->type == 1): ?>
                     <td>Transcript</td>
                     <?php else: ?>
                     <td>Certificate</td>
                     <?php endif; ?>
                     <td><?php echo e($doc->name); ?></td>
                     <td><?php echo e($doc->filename); ?></td>
                     <td><a href="<?php echo e(asset('studentdocuments')); ?>/<?php echo e($doc->filename); ?>" download class="btn btn-success btn-sm">Download</a></td>
                     <td><a href="<?php echo e(url('deletedocument')); ?>/<?php echo e($doc->id); ?>" class="btn btn-danger btn-sm">Delete</a></td>
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
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Assignments</h5>

        </div>

        <div class="ibox-content">
            <form action="viewsubmissions" method="get">

      

           <!--      <select class="blue-bg col-md-3 pull-right" name="assi">
                    <option value="">Select Assignment to view Submissions</option>
                    <?php $__currentLoopData = $filterobj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($obj->id); ?>"><?php echo e($obj->uploadassignment); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select> -->

              <div class="col-md-3 pull-left">
                <label>Filter By Faculty</label>
                <select class="form-control" name="faculty" id="coursefaculty">
                    <option value="">Select Faculty</option>
                     <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fac->id); ?>"><?php echo e($fac->faculty_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
             <div class="col-md-3 pull-left">
                <label>Filter By Course</label>
                <select class="form-control" name="course" id="courselist">
                 
                </select>
            </div>
             <div class="col-md-3">
                <label>Filter</label>
                <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                
            </div>

       

                
         </form>
    
             <table class="table table-responsive table-stripped table-bordered">
                <th>#</th>
                <!-- <th>Check</th> -->
           
                <th>Assignment</th>
                 <th>Deadline</th>
                  <th>Submitted By</th>
                  <th>Submitted AT</th>
                  <th>Download</th>
                 <th>Grading</th>
                 <th>Edit Grade</th>
     
               
  

             <tbody>
                <?php ($count = 1); ?>
                     <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($count); ?></td>
                        <!-- <td><input type="checkbox" class="" id="checker"> <span class="cr"><i class="cr-icon fa fa-rocket"></i></span></td> -->
              
                         <td><?php echo e($ass->submissionname); ?></td>
                         <td><?php echo e($ass->submitby); ?></td>
                         <td><?php echo e($ass->name); ?></td>
                          <td><?php echo e($ass->created_at); ?></td>
                        <?php if($ass->status == 0): ?>
                         <td>
                            <form action="downloadstatus/<?php echo e($ass->id); ?>" method="get">

                            <a href="<?php echo e(asset('assi')); ?>/<?php echo e($ass->assfile); ?>" download ><button class="btn btn-xs btn-success col-md-12"><i class="fa fa-download"> Download</i></button></a>
                        </form>
                        </td>
                        <?php else: ?> 
                        <td>
                            <a href="<?php echo e(asset('assi')); ?>/<?php echo e($ass->assfile); ?>" download ><button class="btn btn-xs btn-danger col-md-12"><i class="fa fa-download"> Downloaded</i></button></a>
                        </td>
                        <?php endif; ?>
                         <td>
                        <?php if(empty($ass->grade)): ?> 
                          <button id="<?php echo e($ass->id); ?>" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalActivate">Grade</button>
                         <?php else: ?>
                          <?php echo e($ass->grade); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                        <?php if(empty($ass->grade)): ?> 
                        <button id="<?php echo e($ass->id); ?>" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalEdit" disabled><i class="fa fa-pencil"></i>Edit</button>
                         <?php else: ?>
                          <button id="<?php echo e($ass->id); ?>" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-pencil"></i>Edit</button>
                          <?php endif; ?>
                        </td>
                        
                        
                     </tr>
                     <?php ($count ++); ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
             </table>
          
            <?php ($cou = \Illuminate\Support\Facades\Input::get('course')); ?>
            <?php if($cou): ?>
            <nav class="navigation"><?php echo e($assignments->appends(['course' => $cou])->links()); ?></nav>
            <?php else: ?>
              <nav class="navigation"><?php echo e($assignments->links()); ?></nav>
            <?php endif; ?>
               
        </div>
 
    </div>

</div>
</div>
</div>



    <div class="modal inmodal" id="myModalActivate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   
                    <h4 class="modal-title">Grade the Student</h4>
                   
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(('grading')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                         <div class="form-group">
                         <label>Upload Marked Assignments</label>
                         <input type="file" name="revertfile" class="form-control">
                        </div>

                           <div class="form-group">
                         <label>Enter the Score</label>
                         <input type="text" name="grade" class="form-control">
                        </div>
                        <hr>
                         <div class="modal-body recordId" hidden>
                            
                        </div>
                     
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Submit Grade</button>

                        </div>
                    </form>
                </div>

            </div>
        </div></div>

         <div class="modal inmodal" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   
                    <h4 class="modal-title">Edit the Student Grade</h4>
                   
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(('editgrade')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                         <label>Upload Marked Assignments</label>
                         <input type="file" name="revertfile" class="form-control">
                        </div>
                      

                           <div class="form-group">
                         <label>Enter the new score</label>
                         <input type="text" name="grade" class="form-control">
                        </div>
                        <hr>
                         <div class="modal-body recordId" hidden>
                            
                        </div>
                     
                        <div class="modal-footer1">
                            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Update Grade</button>

                        </div>
                    </form>
                </div>

            </div>
        </div></div>





    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
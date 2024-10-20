<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-6">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add a New Course</h5>
        </div>
        <div class="ibox-content">
 <form role="form" method="post" action="<?php echo e(url('updatecourse')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($course->id); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Code</label>
                         <input type="text" name="course_code" value="<?php echo e($course->course_code); ?>" class="form-control" id="message"  required>
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Name</label>
                         <input type="text" name="course_name" value="<?php echo e($course->course_name); ?>" class="form-control" id="message"  required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Faculty</label>
                         <select name="field_id" class="form-control"  required>
                            <option value="">Select Status</option>
                            <option value="1">Certificate</option>
                            <option value="2">Diploma</option>
                            <option value="3">Post-Graduate</option>

                         </select>
                       
                    </div>

                    <input type="hidden" name="status" value="1">


                  <div class="form-group">
                        <label for="exampleInputEmail1">Currency</label>
                         <select name="currency" class="form-control" name="field_id"  required>
                            <option value="">Select the Currency</option>
                            <option value="USD">USD</option>
                            <option value="EUROS">EURO</option>
                            <option value="KSH">KSH</option>

                         </select>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Fees Payable</label>
                         <input type="text" name="feespayable" value="<?php echo e($course->feespayable); ?>" class="form-control" id="message"  required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Fees Payable</label>
                         <input type="text" name="feespayable" value="<?php echo e($course->feespayable); ?>" class="form-control" id="message"  required>
                       
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Brief (<?php echo e($course->course_brief); ?>)</label>
                         <input type="file" name="coursebriefs" title="" class="form-control" id="coursebriefs"  required>
                       
                    </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea type="description" name="description"  class="form-control"  id="message" placeholder="Type description of the faculty" required>
                       <?php echo e($course->description); ?> </textarea>
                    </div>
                  <td></td>
                         <td></td>
                          <td></td>
                        
                  
                    <button type="Add" class="btn btn-default">Modify</button>
                    
          </form>
</div>
</div>
</div>

      
    <!--/span-->

</div>
</div>




    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
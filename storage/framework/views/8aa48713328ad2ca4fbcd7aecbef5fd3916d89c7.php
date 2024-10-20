<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">    
    <!--/span-->

     <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Courses List</h5>
        </div>
        <div class="ibox-content">
             <table class="table table-responsive table-stripped table-bordered">
                 <th>Course Code</th>
                 <th>Course Name</th>
                 <th>Category</th>
                 <th>Course Profile</th>
                  <?php if(Auth::user()->roleid == 1): ?>
                 <th>Upload Content</th>
                  <?php elseif(Auth::user()->roleid == 2): ?>
                 <th>Uploaded Content</th>
                 <?php endif; ?>
                  <?php if(Auth::user()->roleid == 1): ?>
                 <th>Edit</th>
                 <th>Delete</th>
                 <?php endif; ?>
          
  
             
              <tbody>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                     <tr>
                         <td><?php echo e($course->course_code); ?></td>
                         <td><?php echo e($course->course_name); ?></td>
                         <td><?php echo e($course->faculty_name); ?></td>
                         <td><a href="courseprofile/<?php echo e($course->id); ?>" ><button class="btn btn-xs btn-primary col-md-12">Course Profile</button></a></td>
                         <?php if(Auth::user()->roleid == 1): ?>
                         <td><a href="unitprofile/<?php echo e($course->id); ?>" ><button class="btn btn-xs btn-success col-md-12">Upload Content</button></a></td>
                         <?php elseif(Auth::user()->roleid == 2): ?>
                         <td><a href="unitprofile/<?php echo e($course->id); ?>" ><button class="btn btn-xs btn-success col-md-12">Uploaded Content</button></a></td>
                         <?php endif; ?> 
                          <?php if(Auth::user()->roleid == 1): ?>
                         <td><a href="editcourse/<?php echo e($course->id); ?>"><button class="btn btn-xs btn-green col-md-12">Edit</button></a></td>
                         <td><a href="deletecourse/<?php echo e($course->id); ?>"><button class="btn btn-xs btn-danger col-md-12">Delete</button></a>
                         </td>
                         <?php endif; ?>
                      
                     </tr>
                   
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
                
             </table>
             
               <nav><?php echo e($courses->links()); ?></nav>
        </div>
 
    </div>

</div>
</div>
</div>

    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
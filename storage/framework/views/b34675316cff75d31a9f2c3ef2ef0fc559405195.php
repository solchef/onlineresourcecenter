 

<?php $__env->startSection('content'); ?>

 <div class="wrapper wrapper-content animated fadeInRight">

        <div class="ibox float-e-margins">
    
       <?php if(Auth::user()->roleid == 1 OR Auth::user()->roleid ==2): ?>   
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

              
                    <div class="profile-info">
                        <div class="">
                  
                            <div>
                                <h4 class="no-margins">
                                  Code:  <?php echo e($units->course_code); ?>

                                </h4>
                                <h4>Name:  <?php echo e($units->course_name); ?></h4>
                                <p>
                               
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table large m-b-xs">
                        <tbody>
                        <tr>
                            <td><p>

                                <small>
                    <h2 class="no-margins">Active since:<?php echo e($units->created_at); ?></h2></small>
                           </p></td>
                          
                        </tr>
                        </tbody>
                    </table>

                 
                </div>
             

            </div>
            <?php else: ?>
            <div class="row ">

                            <div>
                                <h4 class="no-margins">
                                    <?php echo e($units->unit_code); ?> :

                                     <?php echo e($units->unit_name); ?> -  <small>
                                  <?php echo e($units->description); ?>

                                </small>
                                </h4>
                               
                               
                            </div>
                       
            </div>

           <?php endif; ?>
           <hr>
            <div class="row">
                      <div class="col-md-12">
           
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                       
                            
                            <li class="active"><a data-toggle="tab" href="#tab-2">Course Notes</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3">Course Assignments</a></li>
           
                        </ul>
                        <div class="tab-content">
               



<div id="tab-2" class="tab-pane active">
<div class="panel-body">          
<div class="row">
        <?php if(Auth::user()->roleid == 1): ?>
        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> Course Notes</h5><small>Upload New </small>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="<?php echo e(url('uploadnotes')); ?>/<?php echo e($units->id); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="course_id" value="">

         
                    <input type="hidden" name="topic_id" value="1">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose file (Only PDF Format)</label>
                         <input type="file" name="notes" class="form-control" multiple required accept="application/pdf">
                       
                    </div>

                    <button type="Submit" class="btn btn-default">Submit</button>
                    
                </form>
        </div>
        </div>
        </div>

<?php endif; ?>
 
   <div class="col-lg-8">

        <div class="ibox-title">
            <h5>Uploaded Notes</h5>
        </div>

            <table class="table">
            <thead>
              <th>Notes</th>
           <?php if(Auth::user()->roleid == 1): ?>
              <th>Download</th>
              <th>Delete</th>
           <?php endif; ?>
            </thead>
            <tbody>
               <?php $__currentLoopData = $coursenotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($notes->notes); ?></td>
               <?php if(Auth::user()->roleid == 1): ?>
                <td><a href="<?php echo e(asset('coursenotes')); ?>/<?php echo e($notes->notes); ?>" download>Download</a></td>
                <td><a href="<?php echo e(url('deletenotes')); ?>/<?php echo e($notes->id); ?>" >Delete</a></td>
                <?php endif; ?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            
          </table>
        

 
    </div>

          </div>
                </div>
                      </div>
                            
        <div id="tab-3" class="tab-pane">
           <div class="panel-body">
                                                
            
<div class="row">
  <?php if(Auth::user()->roleid == 1): ?>
        <div class="col-lg-4">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> Course Assignments</h5><small>Upload New</small>
        </div>
        <div class="ibox-content">

                <form role="form" method="post" action="<?php echo e(url('uploadassignment')); ?>/<?php echo e($units->id); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="course_id" value="">

                    <input type="hidden" name="topic_id" value="1">


                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Assignment DeadLine</label> -->
                         <input type="date" hidden value="12-12-2018" name="dateline" class="form-control"required>
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose file (only PDF Format)</label>
                         <input type="file" name="notes" class="form-control" multiple required accept="application/pdf">
                       
                    </div>


                 
                  
                    <button type="Submit" class="btn btn-default">Submit</button>
                    
                </form>
</div>
</div>
</div>
<?php endif; ?>

      
    <!--/span-->

<div class="col-lg-8">
      
        <div class="ibox-title">
            <h5>Uploaded Assignment</h5>
        </div>
        
   
          <table class="table">
            <thead>
              <th>Assignment</th>
              <th>Submission Deadline</th>
              <?php if(Auth::user()->roleid == 1): ?>
	      <th>Download</th> 
              <th>Delete</th>
              <?php endif; ?>
            </thead>
            <tbody>
              <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($ass->uploadassignment); ?></td>
                <td><?php echo e($ass->submitby); ?></td>
               <?php if(Auth::user()->roleid == 1): ?>
		<td><a href="<?php echo e(asset('assignments')); ?>/<?php echo e($ass->uploadassignment); ?>" download>Download</a></td>
                <td><a href="<?php echo e(url('deleteass')); ?>/<?php echo e($ass->id); ?>">Delete</a></td>
               <?php endif; ?>
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
        </div>
 <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
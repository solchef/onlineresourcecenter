<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content">
        
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-title" style="background-color:#ffffff">
                      
                    </div>
                    <div>
                        <div class="ibox-content no-padding ">
                            <?php if(empty($user->avatar)): ?>
                           <center> <img alt="image" class="img-responsive" style="height: 150px; width: 150px;" src="<?php echo e(asset('spiniastuff/img/profile_big.jpg')); ?>"></center>
                           <?php else: ?>
                         <center> <img alt="image" class="img-responsive" style="height: 150px; width: 150px;" src="<?php echo e(asset('avatars/' . $user->avatar)); ?>"></center>
                           <?php endif; ?>
                           <br>
                          <center><button class="btn btn-danger btn-xs  " id="avatarchanger"><i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('Change Avatar'); ?></button></center>
                          <div id="avatarform">
                            <form method="post" action="<?php echo e(url('changeavatar')); ?>/<?php echo e(Auth::user()->id); ?>" enctype="multipart/form-data">
                               <?php echo e(csrf_field()); ?>

                                <label><?php echo app('translator')->getFromJson('Upload File'); ?></label>
                                <input type="file" name="avatar" class="form-control">
                                <br>
                                <button class="btn btn-success btn-xs " type="submit" id=""><i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('Change Avatar'); ?></button>
                            </form>
                          </div>
                        </div>
                        
                        <div class="ibox-content profile-content">


                          <center><h2><?php echo e(Auth::user()->name); ?></h2></center>
                             <hr>

                        
                      <?php if(Auth::user()->roleid == 1): ?>
                        
                      <ul class="nav">
                            <li class="active"><a  href="<?php echo e(url('graduatestudent')); ?>/<?php echo e($user->id); ?>" class="btn btn-primary">Graduate Student</a></li>
                            <li class="active"><a  href="<?php echo e(url('viewresults')); ?>/<?php echo e($user->id); ?>" class="btn btn-warning">View Results</a></li>
                            <li class="active"><a href="<?php echo e(url('uploaddocuments')); ?>/<?php echo e($user->id); ?>" class="btn btn-success" >Upload Documents</a></li>
                            <li class="active"><a href="<?php echo e(url('suspendstudent')); ?>/<?php echo e($user->id); ?>" class="btn btn-danger">Suspend Student</a></li>
                          </ul>

                        <?php else: ?>

            <p>Transcripts and Certificates</p>
                      
              <table class="table table-responsive table-stripped table-bordered">
                <!-- <th>#</th> -->
                 <!-- <th>Upload Date</th> -->
                 <!-- <th>Document Type</th> -->
                 <th>Document Name</th> 
                 <th>Download</th>
         

                 <tbody>
                   <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                     <!-- <td><?php echo e($doc->created_at); ?></td> -->
                 <!--     <?php if($doc->type == 1): ?>
                     <td>Transcript</td>
                     <?php else: ?>
                     <td>Certificate</td>
                     <?php endif; ?> -->
                     <td><?php echo e($doc->name); ?></td>
                     <td><a href="<?php echo e(asset('studentdocuments')); ?>/<?php echo e($doc->filename); ?>" download class="btn btn-success btn-sm">Download</a></td>
                  
                   </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>

 
             </table>
                        

                       
             <?php endif; ?>             

                  
                        </div>
                    </div>
                </div>
 
            </div>
          <div class="col-md-8">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-title" style="background-color:#ffffff">
                        <h5 style="color: #009a46"><?php echo app('translator')->getFromJson('Profile'); ?></h5>

                        <a href="<?php echo e(url('addschedule')); ?>/<?php echo e($user->id); ?>" class="btn btn-primary btn-sm pull-right"><?php echo app('translator')->getFromJson('Create Schedules'); ?></a>
                    </div>
                    <div>
                        <div class="ibox-content no-padding ">
                         
                        </div>

                         <div class="ibox-content profile-content">
                       
                             <h4><strong><i class="fa fa-user-circle"></i> <?php echo app('translator')->getFromJson('Name'); ?>: <?php echo e($user->name); ?> </strong></h4>

                            <p><strong><i class="fa fa-phone"></i> <?php echo app('translator')->getFromJson('Phone Number'); ?>:</strong> <?php echo e($user->mobile); ?> </p>
                            <hr>

                            <p><strong><i class="fa fa-address-book"></i> <?php echo app('translator')->getFromJson('Email Address'); ?>:</strong> <?php echo e($user->email); ?> </p>
                            <hr>

                            <?php if($user->roleid == 3): ?>
                           
                            <p><strong><i class="fa fa-cubes"></i> <?php echo app('translator')->getFromJson('Enrolled Course'); ?>:</strong> <?php echo e($user->course_name); ?></p>
                           
                            <hr>
                            <p><strong><i class=" fa fa-question"></i> <?php echo app('translator')->getFromJson('Course Duration'); ?>:</strong> <?php echo e($user->coursestart); ?> - <?php echo e($user->courseend); ?></p>
                            <hr>

                             <p><strong><i class="fa fa-map-marker"></i> <?php echo app('translator')->getFromJson('Residence'); ?>:</strong> <?php echo e($user->residence); ?> </p>
                            <hr>

                             <p><strong><i class="fa fa-cog"></i> <?php echo app('translator')->getFromJson('Occupation'); ?>:</strong> <?php echo e($user->occupation); ?> </p>
                             <?php endif; ?>
                            <hr>

                            <div class="user-button">
                               
                            </div>
                        </div>
                    </div>

                    <h5 style="color: #009a46"><?php echo app('translator')->getFromJson('Profile'); ?></h5>
                </div>
 
            </div>
        </div>
            
 </div>
         





   
 <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <script type="text/javascript">
$(document) .ready(function(){
 $('#avatarform').hide();

 $('#avatarchanger').click(function(){
   $('#avatarform').show();
});
 });



</script>
<?php $__env->stopSection(); ?>
     
        
       

<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
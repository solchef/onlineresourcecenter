 

<?php $__env->startSection('content'); ?>

 <div class="wrapper wrapper-content animated fadeInRight">

        <div class="ibox float-e-margins">
    
       

            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h4 class="no-margins">
                                  Course Code:  <?php echo e($courses->course_code); ?>

                               </h4>
                                <h4>Course Name: <?php echo e($courses->course_name); ?></h4>
                               
                                <p> <?php echo e($courses->description); ?> </p>

                                <!-- <p> <?php echo e($courses->description); ?> </p> -->
                               
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
                    <h2 class="no-margins">Active since:<?php echo e($courses->created_at); ?></h2></small>
                           </p></td>
                          
                        </tr>
                        </tbody>
                    </table>

                 
                </div>


            </div>
            <div class="row">
                      <div class="col-md-12">
           
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-3">Enrolled Students</a></li>
                        </ul>
                        <div class="tab-content">


                             <div id="tab-3" class="tab-pane active">
                                <div class="panel-body">
                                      <div class="ibox float-e-margins">
                    <div class="ibox-content">

    <div class="table-responsive">
       <table class="table table-responsive table-stripped table-bordered">
    <thead>
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>email</th>
      
        <th>Action</th>
     
       
    </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class=""><?php echo e($user->id); ?></td>
        <td class=""><?php echo e($user->name); ?></td>
        <td class=""><?php echo e($user->mobile); ?></td>
        <td class=""><?php echo e($user->email); ?></td>
        <td>
         <a class="col-md-4" class="btn btn-primary btn-sm" href="deleteuser/<?php echo e($user->id); ?>">     
                </i>Delete
            </a>
      
        </td>

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

</div>





    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
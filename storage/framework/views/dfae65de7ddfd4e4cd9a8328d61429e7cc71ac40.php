<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">



    <div class="row">
        <div class="col-lg-7 "  style="left: 200px;" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>This page does not exist</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                   
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                               <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">You have accessed a page that does not exist. Please click on the button below to be redirected.</h3>
            <div class="error-desc">
              			
                <br>
                 <a href="<?php echo e(route('home')); ?>" class="btn btn-success" >
                        <i class="fa fa-sign-out "></i><span class=""> Dashboard </span>
                    </a>
               
            </div>
        </div>              

    </div>

        </div>
      </div>
    </div>
  </div></div>
<?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
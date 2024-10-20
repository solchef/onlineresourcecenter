<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="passwordBox animated bounceIn">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="ibox-content">

                                <h2 class="font-bold"><?php echo app('translator')->getFromJson('Reset password'); ?></h2>

                                <p>
                                    <?php echo app('translator')->getFromJson('Enter your Current and New password to reset your password'); ?>.
                                </p>

                                <div class="row">

                                    <div class="col-lg-12">
                                        <form class="m-t" method="post" role="form" action="<?php echo e(URL::to('/resetpass')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                <input type="password" class="form-control" name="currentpass" placeholder="<?php echo app('translator')->getFromJson('Current Password'); ?>" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" name="newpassword" placeholder="<?php echo app('translator')->getFromJson('New Password'); ?>" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('Confirm New Password'); ?>" required="">
                                            </div>

                                            <button type="submit" class="btn btn-primary block full-width m-b"><?php echo app('translator')->getFromJson('Reset Password'); ?></button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>


        </div>
<?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">
    .product-imitation {
  
         background-image: url(spiniastuff/img/articles.jpg);
         background-position: center;

    }
</style>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo app('translator')->getFromJson('view Articles'); ?></h5>
        </div>
        <div class="ibox-content">
            <div class="row">
<div class="container text-center">
<div class="well well-md col-md-12 hidden-sm hidden-xs">
<div class="row">
<div class="col-md-4">
<div class="text-primary">
<a href="viewarticles" title="" class="text-danger">
<span class="fa fa-2x fa-star-o"></span>
<?php echo app('translator')->getFromJson('POPULAR'); ?>
</a>
</div>
</div>
<div class="col-md-4" id="active">
<div class="text-info">
<a href="viewarticles" title="" class="text-info">
<span class="fa fa-2x fa-clock-o"></span>
<?php echo app('translator')->getFromJson('NEW'); ?>
</a>
</div>
</div>
<div class="col-md-4">
<div class="text-warning">
<a href="viewarticles" title="" class="text-warning">
<span class="fa fa-2x fa-thumbs-up"></span>
<?php echo app('translator')->getFromJson('BEST'); ?>
</a>
</div>
</div>
</div>
</div>
<div class="visible-sm visible-xs" style="margin-top:5%;">
<div class="container">
<form method="get" action="#" role="search">
<div class="form-group col-xs-10">
<input type="text" name="key" class="form-control" placeholder="Search">
</div>
<input type="text" name="url" value="papers-new" style="display:none;">
<div class="form-group col-xs-2">
<button type="submit" class="btn btn-primary">
<span class="fa fa-search"></span>
</button>
</div>
</form>
</div>
</div>


<div class="row">
    <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="">

                            <div class="product-imitation">
                                <?php echo e($articles->title); ?><br><?php echo e($articles->tags); ?>

                            </div>
                            <div class="product-desc">
                                <div class="small m-t-xs">
                                    <?php echo $articles->title; ?>

                                </div>
                                <a href="<?php echo e(url('articledetails')); ?>/<?php echo e($articles->id); ?>" class="btn btn-xs btn-outline btn-primary">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                <?php if(Auth::user()->roleid == 1): ?>
                                 <a href="<?php echo e(url('removearticle')); ?>/<?php echo e($articles->id); ?>" class="btn btn-xs btn-outline btn-primary">Delete <i class="fa fa-remove"></i> </a>
                                 <?php endif; ?>
                                <div class="m-t text-righ">

                                    
                                    <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-eye text-primary"></i>&nbsp;
                                        <?php echo e($articles->views); ?>&nbsp;Views</a>
                                   
                                    <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-thumbs-o-up text-primary"></i>&nbsp;<?php echo e($articles->likes); ?>&nbsp;Likes</a>

                                     <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-comments-o text-primary"></i>&nbsp;<?php echo e($articles->comments); ?>&nbsp;Com</a>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                               
            </div>
           
            <nav><?php echo e($article->links()); ?></nav>

                    </div>
                </div>
            </div>

              
            <!--/span-->


    </div>
</div>





    <?php echo $__env->make('layouts.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
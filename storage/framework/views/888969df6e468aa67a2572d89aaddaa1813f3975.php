<?php $__env->startSection('content'); ?>
<div id="preloader">
    <div class="spinner"></div>
</div>

    <!-- slider area start -->
    <section class="slider-area" id="home">
        <div class="container">
            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="row">
                    <div class="slider-img">
                        <img src="https://www.android.com/static/2016/img/one/devices/gm-gm9_1x.png" alt="slider image">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="slider-inner text-right">
                        <h2>T3</h2>
                        <h5>!</h5>
                        <a class="expand-video" href="https://"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
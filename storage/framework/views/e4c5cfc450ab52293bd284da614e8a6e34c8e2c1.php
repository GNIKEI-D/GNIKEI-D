<?php $__env->startSection('content'); ?>

<div class="full-page-bg" style="background-image: url(<?php echo e(asset('https://st3.depositphotos.com/4361975/15176/v/600/depositphotos_151767792-stock-video-black-taxi-car-in-the.jpg')); ?>);">
    <div class="log-overlay"></div>
    <div class="full-page-bg-inner">
        <div class="row no-margin">
            <div class="col-md-6 log-left">
                <span class="login-logo"><img src="<?php echo e(config('constants.site_logo', asset('logo-black.png'))); ?>"></span>
                <h2>გაიარე ავტორიზაცია და იმგზავრე</h2>
                <p>მოგესალმებით <?php echo e(config('constants.site_title', 'TAXI3')); ?>.</p>
            </div>
            <div class="col-md-6 log-right">
                <div class="login-box-outer">
                <div class="login-box row no-margin">
                    <div class="col-md-12">
                        <a class="log-blk-btn" href="<?php echo e(url('register2')); ?>">რეგისტრაცია</a>
                        <h3>ავტორიზაცია</h3>
                    </div>
                    <form  role="form" method="POST" action="<?php echo e(url('/login')); ?>"> 
                    <?php echo e(csrf_field()); ?>                      
                        <div class="col-md-12">
                             <input id="email" type="email" class="form-control" placehold="ელ-ფოსტა" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" placehold="Password" name="password" required>

                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-12">
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><span> დამიმახსოვრე</span>
                        </div>
                       
                        <div class="col-md-12">
                            <button type="submit" class="log-teal-btn">ავტორიზაცია</button>
                        </div>
                    </form>

                    <?php if(config('constants.social_login', 0) == 1): ?>
                    <div class="col-md-12">
                        <a href="<?php echo e(url('/auth/facebook')); ?>"><button type="submit" class="log-teal-btn fb"><i class="fa fa-facebook"></i>ავტორიზაცია Facebook</button></a>
                    </div>  
<!--                    <div class="col-md-12">
                        <a href="<?php echo e(url('/auth/google')); ?>"><button type="submit" class="log-teal-btn gp"><i class="fa fa-google-plus"></i>ავტორიზაცია GOOGLE</button></a>
                    </div>-->
                    <?php endif; ?>

                    <div class="col-md-12">
                        <p class="helper"> <a href="<?php echo e(url('/password/reset')); ?>">დაგავიწყდა პაროლი?</a></p>   
                    </div>
                </div>


                <div class="log-copy"><p class="no-margin"><?php echo e(config('constants.site_copyright', '&copy; '.date('Y').' TAXI3')); ?></p></div></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
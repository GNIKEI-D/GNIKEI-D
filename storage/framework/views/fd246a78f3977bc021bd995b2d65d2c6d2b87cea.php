<?php $__env->startSection('content'); ?>

<?php $login_user = asset('https://st3.depositphotos.com/4361975/15176/v/600/depositphotos_151767792-stock-video-black-taxi-car-in-the.jpg'); ?>
<div class="full-page-bg" style="background-image: url(<?php echo e($login_user); ?>);">
    <div class="log-overlay"></div>
    <div class="full-page-bg-inner">
        <div class="row no-margin">
            <div class="col-md-6 log-left">
                <span class="login-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(config('constants.site_logo', asset('logo-black.png'))); ?>"></a></span>
                <h2>დარეგისტრირდი მძღოლად</h2>
                <p>დარეგისტრირდი <?php echo e(config('constants.site_title','TAXI3')); ?>,.</p>
            </div>
            <div class="col-md-6 log-right">
                <div class="login-box-outer">
                    <div class="login-box row no-margin">
                        <div class="col-md-12">
                            <a class="log-blk-btn" href="<?php echo e(url('login')); ?>">რეგისტრაცია?</a>
                            <h3>რეგისტრაცია</h3>
                        </div>
                        <form role="form" method="POST" action="<?php echo e(url('/register')); ?>">

<!--                            <div id="first_step">
                                <div class="col-md-4">
                                    <input value="+955" type="text" placehold="+995" id="country_code" name="country_code" />
                                </div> 

                                <div class="col-md-8">
                                    <input type="text" autofocus id="phone_number" class="form-control" placehold="ნომერი" name="phone_number" value="<?php echo e(old('phone_number')); ?>" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);" required/>
                                </div>

                                <div class="col-md-8">
                                    <?php if($errors->has('phone_number')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-12" style="padding-bottom: 10px;" id="mobile_verfication"></div>
                                <div class="col-md-12" style="padding-bottom: 10px;">
                                    <input type="button" class="log-teal-btn small verify_btn" onclick="smsLogin();" value="ვერიფიკაცია"/>
                                </div>

                            </div>-->

                            <?php echo e(csrf_field()); ?>


                            <div id="second_step">
                                <input value="+995" type="hidden" id="country_code" name="country_code" />
                                
                                <div class="col-md-6">
                                    <input type="text" autofocus class="form-control" placehold="სახელი" name="first_name" value="<?php echo e(old('first_name')); ?>" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="სახელი უნდა შეიცავდეს მხოლოდ - ასოებს.">

                                    <?php if($errors->has('first_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placehold="გვარი" name="last_name" value="<?php echo e(old('last_name')); ?>" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="გვარი უნდა შეიცავდეს მხოლოდ - ასოებს">

                                    <?php if($errors->has('last_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" placehold="ელ-ფოსტა" value="<?php echo e(old('email')); ?>" data-validation="email">

                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>                        
                                </div>

                                <div class="col-md-12">
                                    <input type="text" id="phone_number" class="form_tel" class="form-control" placehold="ნომერი" name="phone_number" value="<?php echo e(old('phone_number')); ?>" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);" required/>
                                </div>

                                <div class="col-md-12">
                                    <label class="checkbox"><input type="radio" name="gender" value="MALE" data-validation="required"  data-validation-error-msg="აირჩიე სქელი"> მამაკაცი</label>
                                    <label class="checkbox"><input type="radio" name="gender" value="FEMALE" data-validation-error-msg="აირჩიე სქესი"> ქალი</label>
                                    <?php if($errors->has('gender')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('gender')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div> 

                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password" data-validation="length" data-validation-length="min6" data-validation-error-msg="პაროლი უნდა შედგებოდეს ექვსზე მეტი სიმბოლოსგან.">

                                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password_confirmation" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="პაროლები არ ემთხვევა">

                                    <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <?php if(config('constants.referral') == 1): ?>
                                <div class="col-md-12">
                                    <input type="text" placehold="მოწვევის კოდი (არასავალდებულო)" class="form-control" name="referral_code" >

                                    <?php if($errors->has('referral_code')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('referral_code')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <?php else: ?>
                                <input type="hidden" name="referral_code" >
                                <?php endif; ?>

                                <div class="col-md-12">
                                    <button class="log-teal-btn" type="submit">რეგისტრაია</button>
                                </div>

                            </div>

                        </form>     

                        <div class="col-md-12">
                            <p class="helper"><a href="<?php echo e(route('login')); ?>">შესვლა</a>.</p>   
                        </div>

                    </div>


                    <div class="log-copy"><p class="no-margin"><?php echo e(config('constants.site_copyright', '&copy; '.date('Y').' TAXI3')); ?></p></div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('scripts'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="<?php echo e(asset('asset/js/jmask.js')); ?>"></script>
    <script type="text/javascript">
        $('.form_tel').mask('(99)99999-9999');
        
        <?php if(count($errors) > 0): ?>
                $("#second_step").show();
        <?php endif; ?>
                $.validate({
                modules : 'security',
                });
        $('.checkbox-inline').on('change', function() {
        $('.checkbox-inline').not(this).prop('checked', false);
        });
        function isNumberKey(evt)
        {
        var edValue = document.getElementById("phone_number");
        var s = edValue.value;
        if (event.keyCode == 13) {
        event.preventDefault();
        if (s.length >= 10){
        smsLogin();
        }
        }
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31
                && (charCode < 48 || charCode > 57))
                return false;
        return true;
        }
    </script>
    

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
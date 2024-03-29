<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <a class="log-blk-btn" href="<?php echo e(url('/provider/login')); ?>"><?php echo app('translator')->getFromJson('provider.signup.already_register'); ?></a>
    <h3><?php echo app('translator')->getFromJson('provider.signup.sign_up'); ?></h3>
</div>

<div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/provider/register')); ?>">

<!--        <div id="first_step">
            <div class="col-md-4">
                <input value="+55" type="text" placehold="+55" id="country_code" name="country_code" />
            </div> 
            
            <div class="col-md-8">
                <input type="phone" autofocus id="phone_number" class="form-control" placehold="<?php echo app('translator')->getFromJson('provider.signup.enter_phone'); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);"/>
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
            <div>
                <input id="fname" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.profile.first_name'); ?>" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="<?php echo app('translator')->getFromJson('provider.profile.first_name'); ?> უნდა შეიცავდეს მხოლოდ ასოებს და ციფრებს">
                <?php if($errors->has('first_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div>
                <input id="lname" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.profile.last_name'); ?>"data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="<?php echo app('translator')->getFromJson('provider.profile.last_name'); ?> უნდა შეიცავლეს მხოლოდ ასოებს და ციფრებს">            
                <?php if($errors->has('last_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.signup.email_address'); ?>" data-validation="email">            
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
<!--            <div class="col-md-4">
                <input value="+55" type="text" placehold="+995" id="country_code" name="country_code" />
            </div> -->
            
            <div>
                <input type="phone" id="phone_number" class="form-control form_tel" placehold="<?php echo app('translator')->getFromJson('provider.signup.enter_phone'); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);"/>
            </div>

            <div>
                <label class="checkbox"><input type="radio" name="gender" value="MALE" data-validation="required"  data-validation-error-msg="Please select a gender"><?php echo app('translator')->getFromJson('provider.signup.male'); ?></label>
                <label class="checkbox"><input type="radio" name="gender" value="FEMALE" data-validation-error-msg="Please select a gender"><?php echo app('translator')->getFromJson('provider.signup.female'); ?></label>
                <?php if($errors->has('gender')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('gender')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>                        
            <div>
                <input id="password" type="password" class="form-control" name="password" placehold="<?php echo app('translator')->getFromJson('provider.signup.password'); ?>" data-validation="length" data-validation-length="min6" data-validation-error-msg="პაროლი მოკლეა">

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>    
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placehold="<?php echo app('translator')->getFromJson('provider.signup.confirm_password'); ?>" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="განმეორებითი პაროლი არასწორია">

                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>  
            <?php if(config('constants.paypal_adaptive') == 1): ?>
            <div>
                <input id="service-model" type="text" class="form-control" name="paypal_email" value="<?php echo e(old('paypal_email')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.profile.paypal_email'); ?>" data-validation="email">
                
                <?php if($errors->has('paypal_email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('paypal_email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <span class="help-block">
                        <strong style="color: red; font-size: 10spx;">გთხოვთ დაამატოთ ელ-ფოსტა.</strong>
                    </span>
            <?php endif; ?>
            <div>
                <select class="form-control" name="service_type" id="service_type" data-validation="required">
                    <option value="">Select Service</option>
                    <?php $__currentLoopData = get_all_service_types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php if($errors->has('service_type')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('service_type')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div>
                <input id="service-number" type="text" class="form-control" name="service_number" value="<?php echo e(old('service_number')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.profile.car_number'); ?>" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="<?php echo app('translator')->getFromJson('provider.profile.car_number'); ?> ავტომობილის ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან">
                
                <?php if($errors->has('service_number')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('service_number')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div>
                <input id="service-model" type="text" class="form-control" name="service_model" value="<?php echo e(old('service_model')); ?>" placehold="<?php echo app('translator')->getFromJson('provider.profile.car_model'); ?>" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="<?php echo app('translator')->getFromJson('provider.profile.car_model'); ?> უნდა შედგებოდეს მხოლოდ ასოების და ციფრებისგან">
                
                <?php if($errors->has('service_model')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('service_model')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <?php if(config('constants.referral') == 1): ?>
                <div>
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
            <button type="submit" class="log-teal-btn">
                <?php echo app('translator')->getFromJson('provider.signup.register'); ?>
            </button>

        </div>
    </form>
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
            if(s.length>=10){
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
<script src="https://sdk.accountkit.com/pt_BR/sdk.js"></script>
<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId: <?php echo e(config('constants.facebook_app_id')); ?>, 
        state:"state", 
        version: "<?php echo e(config('constants.facebook_app_version')); ?>",
        fbAppEventsEnabled:true
      }
    );
  };

  // login callback
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
      $('#mobile_verfication').html("<p class='helper'> * ნომრის ვერიფიკაცია </p>");
      $('#phone_number').attr('readonly',true);
      $('#country_code').attr('readonly',true);
      $('#second_step').fadeIn(400);
      $('.verify_btn').hide();

      $.post("<?php echo e(route('account.kit')); ?>",{ code : code }, function(data){
        $('#phone_number').val(data.phone.national_number);
        $('#country_code').val('+'+data.phone.country_prefix);
      });

    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      $('#mobile_verfication').html("<p class='helper'> * ავტორიზაცია ვერ მოხერხდა </p>");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // phone form submission handler
  function smsLogin() {
    var countryCode = document.getElementById("country_code").value;
    var phoneNumber = document.getElementById("phone_number").value;

    $.post("<?php echo e(url('/provider/verify-credentials')); ?>",{ _token: '<?php echo e(csrf_token()); ?>', mobile : countryCode+phoneNumber }).done(function(data){ 


        $('#mobile_verfication').html("<p class='helper'> Por favor, aguarde... </p>");
        //$('#phone_number').attr('readonly',true);
        //$('#country_code').attr('readonly',true);

        AccountKit.login(
          'PHONE', 
          {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
          loginCallback
        );

    })
    .fail(function(xhr, status, error) {
        $('#mobile_verfication').html("<p class='helper'> "+xhr.responseJSON.message+" </p>");
    });

  }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('provider.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
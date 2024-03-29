@extends('provider.layout.auth')

@section('content')
<div class="col-md-12">
    <a class="log-blk-btn" href="{{ url('/provider/login') }}">@lang('provider.signup.already_register')</a>
    <h3>@lang('provider.signup.sign_up')</h3>
</div>

<div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/provider/register') }}">

<!--        <div id="first_step">
            <div class="col-md-4">
                <input value="+55" type="text" placehold="+55" id="country_code" name="country_code" />
            </div> 
            
            <div class="col-md-8">
                <input type="phone" autofocus id="phone_number" class="form-control" placehold="@lang('provider.signup.enter_phone')" name="phone_number" value="{{ old('phone_number') }}" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);"/>
            </div>

            <div class="col-md-8">
                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-12" style="padding-bottom: 10px;" id="mobile_verfication"></div>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <input type="button" class="log-teal-btn small verify_btn" onclick="smsLogin();" value="ვერიფიკაცია"/>
            </div>
        </div>-->

        {{ csrf_field() }}

        <div id="second_step">
            <input value="+995" type="hidden" id="country_code" name="country_code" />
            <div>
                <input id="fname" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placehold="@lang('provider.profile.first_name')" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.first_name') უნდა შეიცავდეს მხოლოდ ასოებს და ციფრებს">
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="lname" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placehold="@lang('provider.profile.last_name')"data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.last_name') უნდა შეიცავლეს მხოლოდ ასოებს და ციფრებს">            
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placehold="@lang('provider.signup.email_address')" data-validation="email">            
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
<!--            <div class="col-md-4">
                <input value="+55" type="text" placehold="+995" id="country_code" name="country_code" />
            </div> -->
            
            <div>
                <input type="phone" id="phone_number" class="form-control form_tel" placehold="@lang('provider.signup.enter_phone')" name="phone_number" value="{{ old('phone_number') }}" data-stripe="number" maxlength="11" onkeypress="return isNumberKey(event);"/>
            </div>

            <div>
                <label class="checkbox"><input type="radio" name="gender" value="MALE" data-validation="required"  data-validation-error-msg="Please select a gender">@lang('provider.signup.male')</label>
                <label class="checkbox"><input type="radio" name="gender" value="FEMALE" data-validation-error-msg="Please select a gender">@lang('provider.signup.female')</label>
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>                        
            <div>
                <input id="password" type="password" class="form-control" name="password" placehold="@lang('provider.signup.password')" data-validation="length" data-validation-length="min6" data-validation-error-msg="პაროლი მოკლეა">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>    
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placehold="@lang('provider.signup.confirm_password')" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="განმეორებითი პაროლი არასწორია">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>  
            @if (config('constants.paypal_adaptive') == 1)
            <div>
                <input id="service-model" type="text" class="form-control" name="paypal_email" value="{{ old('paypal_email') }}" placehold="@lang('provider.profile.paypal_email')" data-validation="email">
                
                @if ($errors->has('paypal_email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('paypal_email') }}</strong>
                    </span>
                @endif
            </div>
            <span class="help-block">
                        <strong style="color: red; font-size: 10spx;">გთხოვთ დაამატოთ ელ-ფოსტა.</strong>
                    </span>
            @endif
            <div>
                <select class="form-control" name="service_type" id="service_type" data-validation="required">
                    <option value="">Select Service</option>
                    @foreach(get_all_service_types() as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('service_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_type') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-number" type="text" class="form-control" name="service_number" value="{{ old('service_number') }}" placehold="@lang('provider.profile.car_number')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_number') ავტომობილის ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან">
                
                @if ($errors->has('service_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_number') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-model" type="text" class="form-control" name="service_model" value="{{ old('service_model') }}" placehold="@lang('provider.profile.car_model')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_model') უნდა შედგებოდეს მხოლოდ ასოების და ციფრებისგან">
                
                @if ($errors->has('service_model'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_model') }}</strong>
                    </span>
                @endif
            </div>
            @if(config('constants.referral') == 1)
                <div>
                    <input type="text" placehold="მოწვევის კოდი (არასავალდებულო)" class="form-control" name="referral_code" >

                    @if ($errors->has('referral_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('referral_code') }}</strong>
                        </span>
                    @endif
                </div>
            @else
                <input type="hidden" name="referral_code" >
            @endif
            <button type="submit" class="log-teal-btn">
                @lang('provider.signup.register')
            </button>

        </div>
    </form>
</div>
@endsection


@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="{{ asset('asset/js/jmask.js') }}"></script>
<script type="text/javascript">
    $('.form_tel').mask('(99)99999-9999');
    
    @if (count($errors) > 0)
        $("#second_step").show();
    @endif
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
        appId: {{config('constants.facebook_app_id')}}, 
        state:"state", 
        version: "{{config('constants.facebook_app_version')}}",
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

      $.post("{{route('account.kit')}}",{ code : code }, function(data){
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

    $.post("{{url('/provider/verify-credentials')}}",{ _token: '{{csrf_token()}}', mobile : countryCode+phoneNumber }).done(function(data){ 


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

@endsection
@extends('user.layout.auth')

@section('content')

<div class="full-page-bg" style="background-image: url({{ asset('https://st3.depositphotos.com/4361975/15176/v/600/depositphotos_151767792-stock-video-black-taxi-car-in-the.jpg') }});">
    <div class="log-overlay"></div>
    <div class="full-page-bg-inner">
        <div class="row no-margin">
            <div class="col-md-6 log-left">
                <span class="login-logo"><img src="{{ config('constants.site_logo', asset('logo-black.png'))}}"></span>
                <h2>გაიარე ავტორიზაცია და იმგზავრე</h2>
                <p>მოგესალმებით {{config('constants.site_title', 'TAXI3')}}.</p>
            </div>
            <div class="col-md-6 log-right">
                <div class="login-box-outer">
                <div class="login-box row no-margin">
                    <div class="col-md-12">
                        <a class="log-blk-btn" href="{{url('register2')}}">რეგისტრაცია</a>
                        <h3>ავტორიზაცია</h3>
                    </div>
                    <form  role="form" method="POST" action="{{ url('/login') }}"> 
                    {{ csrf_field() }}                      
                        <div class="col-md-12">
                             <input id="email" type="email" class="form-control" placehold="ელ-ფოსტა" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" placehold="Password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}><span> დამიმახსოვრე</span>
                        </div>
                       
                        <div class="col-md-12">
                            <button type="submit" class="log-teal-btn">ავტორიზაცია</button>
                        </div>
                    </form>

                    @if(config('constants.social_login', 0) == 1)
                    <div class="col-md-12">
                        <a href="{{ url('/auth/facebook') }}"><button type="submit" class="log-teal-btn fb"><i class="fa fa-facebook"></i>ავტორიზაცია Facebook</button></a>
                    </div>  
<!--                    <div class="col-md-12">
                        <a href="{{ url('/auth/google') }}"><button type="submit" class="log-teal-btn gp"><i class="fa fa-google-plus"></i>ავტორიზაცია GOOGLE</button></a>
                    </div>-->
                    @endif

                    <div class="col-md-12">
                        <p class="helper"> <a href="{{ url('/password/reset') }}">დაგავიწყდა პაროლი?</a></p>   
                    </div>
                </div>


                <div class="log-copy"><p class="no-margin">{{ config('constants.site_copyright', '&copy; '.date('Y').' TAXI3') }}</p></div></div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.signup-app')
@section('content')
<div class="bg-signin">
    <div class="container d-flex align-items-center w-100 h-100 p-3 mx-auto signIn">
        <div class="row">
            <div class="col-md-7">
                <img class="pb-5" src="img/logo.png" alt="Recdirec" width="250">
                <h5 class="lh5 pb-3">Our goal is to provide law firm and In-house legal resourcing teams with greater knowledge and information about the legal recruitment market to help improve efficiency, transparency and the services provided throughout the recruitment process.</h5>

                <h5 class="lh5 pb-4">If you work within an In-house resourcing team for a law firm, a company that has an In-house legal department or are a partner that is in charge of recruiting for law firms and would like to access this information, click below and we will provide you with 3 months' free trail access.</h5>

                <!-- <h5 class="lh5">Register to receive the Recdirec weekly update.</h5>

                <h6 class="lh5 pb-4 text-muted">A quick and easy to read review of all the main stories in the legal press <br/>most relevant to legal resourcing teams.</h6> -->

                <button type="button" class="btn btn-form br-40 px-5 mb-4">
                    <a class="text-white" href="{{ route('register') }}">Get Started</a>
                </button>

                <!-- <footer class="footer">
                    <small class="text-muted">info@legalrecruitmentmadeclear.com</small>
                </footer> -->
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <small><a class="text-white" href="{{ route('register') }}">REGISTER</a></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-white py-2 lh5">{{ __('Sign me in') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('login') }}" id="login">
                                    @csrf
                                    @if(count($errors))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control mb-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if(\App\SiteConstants::CAPTCHA_SITE_KEY)
                                    <div class="form-group py-2">
                                        <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="{!! \App\SiteConstants::CAPTCHA_SITE_KEY !!}"></div>

                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <button type="submit" class="btn py-2 w-100 signin-Button">
                                            {{ __('Sign In') }}
                                        </button>
                                    </div>
                                    <div class="form-group pt-1">
                                        @if (Route::has('password.request'))
                                        <small>
                                            <a class="text-signIn" href="{{ route('password.request') }}">
                                                {{ __('Forgotten Password?') }}
                                            </a>
                                        </small>
                                        @endif
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-7">
                                            <small>
                                                <a href="{{ url('/terms') }}" class="text-signIn">Terms & Conditions</a>
                                                <span class="text-signIn"> | </span>
                                                <a href="{{ url('/privacy') }}" class="text-signIn">Privacy Policy</a>
                                            </small>
                                        </div>
                                        <div class="col-5 text-right">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            <i class="fa fa-twitter px-2" aria-hidden="true"></i>
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#login").on("submit", function(){
            $(".bg_load").show();
        });
    });
</script>
@endsection
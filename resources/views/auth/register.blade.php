@extends('layouts.signup-app')
@section('content')
<div class="bg-signin">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column signIn">
        <div class="row">
            <div class="col-md-7 lh5 login-align">
                <h5 class="lh5 pb-3 ">Helping lawyers navigate their most successful, enjoyable and rewarding career path.</h5>

              
                <h5 class="lh5 pb-3">Thank you for registering to join rackle.  This is a free to use site for relevant individuals in law firms / in-house who are involved in the recruitment process. We ask for details of your current firm and position to ensure that you fit within this community, and request your mobile and work email in case we need to verify information. </h5>

                <a class="text-white" href="{{ route('login') }}">
                   <button type="button" class="btn btn-form br-40 px-5 mb-4">
                       Already have an account? <span class="text-white">Sign In here</span>
                   </button>
               </a>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="row pt-5">
                            <!-- <div class="col-md-12 text-right">
                                <small><a class="text-white" href="{{ route('login') }}">SIGN IN</a></small>
                            </div> -->
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="pt-5 text-white "><span>THE</span> <span class="text-blue">RACKLE</span></h4>
                                <h4 class="text-white py-2 lh5">{{ __('Please register to join rackle') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('register') }}" id="register">
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control mb-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="firm_name" type="text" class="form-control mb-1 @error('firm_name') is-invalid @enderror" name="firm_name" value="{{ old('firm_name') }}" required autocomplete="firm_name" autofocus placeholder="Firm">

                                        @error('firm_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="position" type="text" class="form-control mb-1 @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus placeholder="Position">

                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group">
                                        <input id="contact_number" type="text" class="form-control mb-1 @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus placeholder="Contact Number">

                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> -->
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control mb-1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control mb-1" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input id="termsConditions" type="checkbox" class="custom-control-input form-control @error('accepted_terms') is-invalid @enderror" name="accepted_terms" value="YES" required autocomplete="accepted_terms" autofocus>
                                            <label class="custom-control-label text-signIn" for="termsConditions">
                                                <small>    
                                                    I accept <a href={{ url('terms') }} class="text-signIn" target="blank">Terms & Conditions</a>, 
                                                    <a href={{ url('privacy') }}  class="text-signIn" target="blank">Privacy Policy</a>
                                                </small>
                                            </label>
                                            @error('accepted_terms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input id="privacyPolicy" type="checkbox" class="custom-control-input @error('privacy_policy') is-invalid @enderror" name="privacy_policy" value="YES" required autocomplete="privacy_policy" autofocus>
                                            <label class="custom-control-label text-signIn" for="privacyPolicy">
                                                <small>I accept <a href={{ url('privacy') }}  class="text-signIn" target="blank">Privacy Policy</a></small>
                                            </label>
                                            @error('privacy_policy')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> -->
                                    {{-- @if(\App\SiteConstants::CAPTCHA_SITE_KEY)
                                    <div class="form-group">
                                        <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="{!! \App\SiteConstants::CAPTCHA_SITE_KEY !!}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @endif --}}
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary w-100 signin-Button">
                                            {{ __('Join rackle') }}
                                        </button>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-12">
                                            <small>
                                                <a href="{{ url('/terms') }}" class="text-signIn">Terms & Conditions</a>
                                                <span class="text-signIn"> | </span>
                                                <a href="{{ url('/privacy') }}" class="text-signIn">Privacy Policy</a>
                                            </small>
                                        </div>
                                        <!-- <div class="col-5 text-right">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            <i class="fa fa-twitter px-2" aria-hidden="true"></i>
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </div> -->
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
        $("#register").on("submit", function(){
            $(".bg_load").show();
        });
    });
</script>
@endsection
@extends('frontend.app', ['title' => 'Register'])

@section('main')
<!-- main area starts -->
<main>
    <!-- sign up section start -->
     <section class="signup-section-area">
        <div class="container">
            <div class="sign-up-content-wrapper row">
                <div class="col-md-6">
                    <h2 class="signup-heading">Input your information</h2>
                    <p class="signup-para signup-para-1">
                        We need you to help us with some basic information for your account creation. Here are our <a class="signup-terms" href="terms.html">terms and conditions</a>. Please read them carefully. We are GDRP compliiant
                    </p>

                    <div class="signup-input-field">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputname" name="name" placeholder="Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="agreeTerms" name="terms" required>
                                <label class="form-check-label signup-para" for="agreeTerms">I agree with <a class="signup-terms" href="terms.html">terms and conditions</a></label>
                                @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="change-pwd-div">
                                <button type="submit" class="sign-up-register">Register</button>
                            </div>
                        </form>
                    </div>

                    <div class="already-member d-flex align-items-center gap-4">
                        <p class="already-member-para">Already a member?</p>
                        <a href="login.html">
                            <img src="assets/images/profile.png" alt="" srcset="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 signup-col-2">
                    <img src="frontend/assets/images/signup-img-1.png" alt="" srcset="">
                </div>
            </div>
        </div>
     </section>

    <!-- sign up section End -->
</main>
<!-- main area ends -->
    
@endsection
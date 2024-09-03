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
                        <form action="success.html">
                            <div class="form-group">
                               <input type="text" class="form-control" id="inputname" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            
                            <div class="form-group">
                               <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                                <label class="form-check-label signup-para" for="agreeTerms">I agree with <a class="signup-terms" href="terms.html">terms and conditions</a> </label>
                              </div>
                              <div class="change-pwd-div">
                                <a href="success.html"></a>
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
                    <img src="assets/images/signup-img-1.png" alt="" srcset="">
                </div>
            </div>
        </div>
     </section>

    <!-- sign up section End -->
</main>
<!-- main area ends -->
    
@endsection
@extends('frontend.app', ['title' => 'Forget Password'])

@section('main')   
<!-- main area starts --> 
<section class=" bi-login-container">
    <div class="login-container-left">
      <div class="form-container">
        <h1>Forgot
          password?</h1>
        <p>Don't worry we can help you out! if you still remember your email address you can quickly reset your
          password. Just input that information in the fields below and click on the button. This will send you a new
          email that will link you to the password change website. </p>
        <hr />
        <form action="{{ route('passchange')}}">
          <div class="bi-login-input-wrapper">
            <input type="email" placeholder="Your Email" name="email" id="email" />
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path opacity="0.1"
                d="M12 0C15.315 0 18 2.685 18 6C18 9.315 15.315 12 12 12C8.685 12 6 9.315 6 6C6 2.685 8.685 0 12 0ZM12 24C12 24 24 24 24 21C24 17.4 18.15 13.5 12 13.5C5.85 13.5 0 17.4 0 21C0 24 12 24 12 24Z"
                fill="black" />
            </svg>
          </div>
          <hr />

          <div class="bi-login-input-wrapper ">
            <button type="submit" value="" name="submit" id="submit">Request Password Change</button>
          </div>
        </form>
      </div>
      <div class="redirect-container">
        <p>Do you need help?</p>
        <a href="registration.html">Customer Support</a>
      </div>
    </div>
    <div class="login-container-right">
      <img class="" src="frontend/assets/images/cuate.png"  alt="" srcset=""> 
    </div>
  </section>
  <!-- main area ends -->
@endSection
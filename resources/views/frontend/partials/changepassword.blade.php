@extends('frontend.app', ['title' => 'Forget Password'])

@section('main')
<!-- main area starts -->
<main>
    <!-- change passeword section start -->
     <section class="signup-section-area">
        <div class="container">
            <div class="sign-up-content-wrapper row">
                <div class="col-md-6">
                    <h2 class="signup-heading">Change password</h2>
                    <p class="signup-para signup-para-1">
                        Input your new desired password in the input fields below to create a new password. We strongly advise you to store it safely.
                    </p>
                    <div class="signup-input-field">
                        <form id="passwordForm" action="success.html" onsubmit="return validateForm()">
                            <div class="form-group new-password">
                                <input type="password" class="form-control" id="password" placeholder="New Password" required>
                                <div class="password-strength" id="password-strength">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="form-group confirm-password">
                               <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                                <div class="change-pwd-div">
                                    <button type="submit" class="password-change-btn">Request Password Change</button>
                                </div>
                        </form>
                    </div>
                    <div class="already-member d-flex gap-4 flex-column">
                        <p class="need-help-para">
                            Do you need help?
                        </p>
                        <p class="already-member-para">Customer Support</p>
                    </div>
                </div>
                <div class="col-md-6 signup-col-2">
                    <img src="frontend/assets/images/signup-img-1.png" alt="" srcset="">
                </div>
            </div>
        </div>
     </section>

    <!-- change password section End -->
</main>
<!-- main area ends -->
@endSection
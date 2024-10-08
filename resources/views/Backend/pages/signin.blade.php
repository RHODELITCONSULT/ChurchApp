@extends('Backend.AdminLayout.auth')
@section('auth-content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="{{ asset('assets/Backend/img/logo.png') }}" alt="img">
                    </div>
                    <div class="login-userheading">
                        <h3>Sign In</h3>
                        <h4>Please login to your account</h4>
                    </div>
                    <div class="form-login">
                        <label>Email</label>
                        <div class="form-addons">
                            <input type="text" placeholder="Enter your email address">
                            <img src="{{ asset('assets/Backend/img/icons/mail.svg') }}" alt="img">
                        </div>
                    </div>
                    <div class="form-login">
                        <label>Password</label>
                        <div class="pass-group">
                            <input type="password" class="pass-input" placeholder="Enter your password">
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                    </div>
                    <div class="form-login">
                        <div class="alreadyuser">
                            <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                        </div>
                    </div>
                    <div class="form-login">
                        <a class="btn btn-login" href="index.html">Sign In</a>
                    </div>
                    <div class="signinform text-center">
                        <h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
                    </div>
                    <div class="form-setlogin">
                        <h4>Or sign up with</h4>
                    </div>
                    <div class="form-sociallink">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/Backend/img/icons/google.png') }}" class="me-2"
                                        alt="google">
                                    Sign Up using Google
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/Backend/img/icons/facebook.png') }}" class="me-2"
                                        alt="google">
                                    Sign Up using Facebook
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="login-img">
                <img src="{{ asset('assets/Backend/Backend/img/login.jpg') }}" alt="img">
            </div>
        </div>
    </div>
@endsection

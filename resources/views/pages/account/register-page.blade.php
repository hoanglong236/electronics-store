@extends('shared.layouts.login-register-layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="auth-form-container">
                    <div class="auth-form-area">
                        <div class="auth-form-wrapper">
                            @include('shared.components.header-logo-section')
                            <div class="auth-form-title">
                                <h4>REGISTER ACCOUNT</h4>
                            </div>
                            <form action="" class="aa-login-form">
                                <label for="registerEmail">Email address<span>*</span></label>
                                <input id="registerEmail" type="text" placeholder="Email" required>
                                <label for="registerPassword">Password<span>*</span></label>
                                <input id="registerPassword" type="password" placeholder="Password" required>
                                <label for="confirmPassword">Password<span>*</span></label>
                                <input id="confirmPassword" type="password" placeholder="Confirm password" required>
                                <button type="submit" class="aa-browse-btn">Register</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

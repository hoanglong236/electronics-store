@extends('shared.layouts.login-register-layout')

@section('container-content')
    <div class="row">
        <div class="col-md-12 auth-form-container">
            <div class="auth-form-area">
                @include('shared.components.header-logo-section')
                <div class="form-title">
                    <h4>REGISTER ACCOUNT</h4>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="registerName" class="form-label">Name(*)</label>
                                <input id="registerName" class="form-control" type="text" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="registerPhone" class="form-label">Phone(*)</label>
                                <input id="registerPhone" class="form-control" type="text" placeholder="Phone"
                                    maxlength="15" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail" class="form-label">Email(*)</label>
                        <input id="registerEmail" class="form-control" type="email" placeholder="Email" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="registerPassword" class="form-label">Password(*)</label>
                                <input id="registerPassword" class="form-control" type="password" placeholder="Password"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">Confirm password(*)</label>
                                <input id="confirmPassword" class="form-control" type="password"
                                    placeholder="Confirm password" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn action-btn register-btn mt-3">Register</button>
                </form>
                <div class="external-link">
                    New to <strong>daily<span>Shop</span></strong>?
                    <a href="http://">Create an account.</a>
                </div>
            </div>
        </div>
    </div>
@endsection

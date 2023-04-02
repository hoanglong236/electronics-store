<?php

namespace App\Http\Controllers;

use App\Common\Constants;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    public function login()
    {
        $data = [
            'pageTitle' => 'Login',
        ];
        return view('pages.account.login-page', ['data' => $data]);
    }

    public function loginHandler(LoginRequest $loginRequest)
    {
        $loginProperties = $loginRequest->validated();
        $isLoginSuccess = $this->customerService->login($loginProperties);

        if ($isLoginSuccess) {
            return redirect()->action([HomeController::class, 'index']);
        }

        Session::flash(Constants::ACTION_ERROR, Constants::LOGIN_DETAIL_INVALID);
        return redirect()->action([CustomerController::class, 'login']);
    }

    public function register()
    {
        $data = [
            'pageTitle' => 'Register account',
        ];
        return view('pages.account.register-page', ['data' => $data]);
    }

    public function registerHandler(RegisterRequest $registerRequest)
    {
        $registerProperties = $registerRequest->validated();
        $this->customerService->register($registerProperties);

        Session::flash(Constants::ACTION_SUCCESS, Constants::REGISTER_SUCCESS);
        return redirect()->action([CustomerController::class, 'login']);
    }

    public function logout()
    {
        $this->customerService->logout();

        Session::flash(Constants::ACTION_SUCCESS, Constants::LOGOUT_SUCCESS);
        return redirect()->action([CustomerController::class, 'login']);
    }
}

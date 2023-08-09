<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants;
use App\Constants\MessageConstants;
use App\Http\Requests\CustomerAddressRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AccountService;
use App\Services\CommonService;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    private $accountService;
    private $commonService;

    public function __construct(AccountService $accountService, CommonService $commonService)
    {
        $this->accountService = $accountService;
        $this->commonService = $commonService;
    }

    public function login()
    {
        $data = [];
        $data['pageTitle'] = 'Login';
        return view('pages.account.login-page', ['data' => $data]);
    }

    public function loginHandler(LoginRequest $loginRequest)
    {
        $loginProperties = $loginRequest->validated();
        $isLoginSuccess = $this->accountService->login($loginProperties);

        if ($isLoginSuccess) {
            return redirect()->action([HomeController::class, 'index']);
        }

        Session::flash(MessageConstants::ACTION_ERROR, MessageConstants::LOGIN_DETAIL_INVALID);
        return redirect()->action([AccountController::class, 'login'])->withInput();
    }

    public function register()
    {
        $data = [];
        $data['pageTitle'] = 'Register account';
        return view('pages.account.register-page', ['data' => $data]);
    }

    public function registerHandler(RegisterRequest $registerRequest)
    {
        $registerProperties = $registerRequest->validated();
        $this->accountService->register($registerProperties);

        Session::flash(CommonConstants::ACTION_SUCCESS, MessageConstants::REGISTER_SUCCESS);
        return redirect()->action([AccountController::class, 'login']);
    }

    public function logout()
    {
        $this->accountService->logout();

        Session::flash(CommonConstants::ACTION_SUCCESS, MessageConstants::LOGOUT_SUCCESS);
        return redirect()->action([AccountController::class, 'login']);
    }

    public function showInfo()
    {
        $customer = $this->commonService->getCurrentLoggedInCustomer();

        $data = [];
        $data['pageTitle'] = 'Customer Information';
        $data['customer']['addresses'] = $this->accountService->getCustomerAddresses($customer->id);
        $data['customer']['mainInfo'] = $customer;
        $data['categoryTrees'] = $this->commonService->getCategoryTrees();

        return view('pages.account.account-info-page', ['data' => $data]);
    }

    public function addCustomerAddress(CustomerAddressRequest $customerAddressRequest)
    {
        $customer = $this->commonService->getCurrentLoggedInCustomer();

        $customerAddressProperties = $customerAddressRequest->validated();
        $customerAddressProperties['customerId'] = $customer->id;
        $this->accountService->addCustomerAddress($customerAddressProperties);

        Session::flash(CommonConstants::ACTION_SUCCESS, MessageConstants::CREATE_SUCCESS);
        return redirect()->action([AccountController::class, 'showInfo']);
    }

    public function deleteCustomerAddress(int $customerAddressId)
    {
        $this->accountService->deleteCustomerAddressById($customerAddressId);

        Session::flash(CommonConstants::ACTION_SUCCESS, MessageConstants::DELETE_SUCCESS);
        return redirect()->action([AccountController::class, 'showInfo']);
    }

    public function changeDefaultCustomerAddress(int $newAddressId)
    {
        $customer = $this->commonService->getCurrentLoggedInCustomer();
        $isSuccess = $this->accountService->changeDefaultCustomerAddress($newAddressId, $customer->id);

        if ($isSuccess) {
            Session::flash(CommonConstants::ACTION_SUCCESS, MessageConstants::UPDATE_SUCCESS);
        } else {
            Session::flash(CommonConstants::ACTION_ERROR, MessageConstants::OPERATION_FAILURE);
        }
        return redirect()->action([AccountController::class, 'showInfo']);
    }
}

<?php

namespace App\Services;

use App\Repositories\IAccountRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountService
{
    private $accountRepository;

    public function __construct(IAccountRepository $iAccountRepository)
    {
        $this->accountRepository = $iAccountRepository;
    }

    public function register(array $registerProps)
    {
        $registerProps['password'] = Hash::make($registerProps['password']);
        $customer = $this->accountRepository->createCustomer($registerProps);
        $this->accountRepository->createCustomerCart($customer->id);
    }

    public function login(array $loginProps)
    {
        return Auth::guard('customer')->attempt([
            'email' => $loginProps['email'],
            'password' => $loginProps['password'],
            'disable_flag' => false,
            'delete_flag' => false,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }

    public function addCustomerAddress(array $customerAddressProps)
    {
        $createAttributes = [];
        $createAttributes['customer_id'] = $customerAddressProps['customerId'];
        $createAttributes['city'] = $customerAddressProps['city'];
        $createAttributes['district'] = $customerAddressProps['district'];
        $createAttributes['ward'] = $customerAddressProps['ward'];
        $createAttributes['specific_address'] = $customerAddressProps['specificAddress'];
        $createAttributes['address_type'] = $customerAddressProps['addressType'];
        $createAttributes['default_flag'] = $customerAddressProps['defaultFlag'];

        $this->accountRepository->addCustomerAddress($createAttributes);
    }

    public function changeDefaultCustomerAddress(int $addressId, int $customerId)
    {
        $newDefaultAddress = $this->accountRepository->changeDefaultCustomerAddress($addressId, $customerId);
        return $newDefaultAddress !== false;
    }

    public function deleteCustomerAddressById(int $addressId)
    {
        $this->accountRepository->deleteCustomerAddressById($addressId);
    }
}

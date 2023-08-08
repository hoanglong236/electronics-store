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

    public function register($registerProperties)
    {
        $registerProperties['password'] = Hash::make($registerProperties['password']);
        $customer = $this->accountRepository->createCustomer($registerProperties);
        $this->accountRepository->createCustomerCart($customer->id);
    }

    public function login($loginProperties)
    {
        return Auth::guard('customer')->attempt([
            'email' => $loginProperties['email'],
            'password' => $loginProperties['password'],
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

    public function getCustomerAddresses(int $customerId)
    {
        return $this->accountRepository->getCustomerAddressesByCustomerId($customerId);
    }

    public function addCustomerAddress(array $customerAddressProperties)
    {
        $createAttributes = [];
        $createAttributes['customer_id'] = $customerAddressProperties['customerId'];
        $createAttributes['city'] = $customerAddressProperties['city'];
        $createAttributes['district'] = $customerAddressProperties['district'];
        $createAttributes['ward'] = $customerAddressProperties['ward'];
        $createAttributes['specific_address'] = $customerAddressProperties['specificAddress'];
        $createAttributes['address_type'] = $customerAddressProperties['addressType'];
        $createAttributes['default_flag'] = $customerAddressProperties['defaultFlag'];

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

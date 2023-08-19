<?php

namespace App\Repositories\Concretes;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Repositories\IAccountRepository;

class AccountRepository implements IAccountRepository
{
    public function createCustomer(array $attributes)
    {
        return Customer::create($attributes);
    }

    public function createCustomerCart(int $customerId)
    {
        return Cart::create(['customer_id' => $customerId]);
    }

    public function updateCustomer(array $attributes, int $customerId)
    {
        $customer = Customer::where([
            'id' => $customerId,
            'disable_flag' => false,
            'delete_flag' => false
        ])->first();

        if ($customer) {
            $customer->update($attributes);
            return $customer;
        }
        return false;
    }

    public function addCustomerAddress(array $attributes)
    {
        return CustomerAddress::create($attributes);
    }

    public function updateCustomerAddress(array $attributes, int $addressId)
    {
        $address = CustomerAddress::find($addressId);
        if ($address) {
            $address->update($attributes);
            return $address;
        }
        return false;
    }

    public function deleteCustomerAddressById(int $addressId)
    {
        $address = CustomerAddress::find($addressId);
        if ($address) {
            $address->delete();
            return $address;
        }
        return false;
    }

    public function changeDefaultCustomerAddress(int $newDefaultAddressId, int $customerId)
    {
        $oldDefaultAddress = CustomerAddress::where([
            'customer_id' => $customerId,
            'default_flag' => true
        ])->first();
        if ($oldDefaultAddress) {
            $oldDefaultAddress->update(['default_flag' => false]);
        }

        $newDefaultAddress = CustomerAddress::find($newDefaultAddressId);
        if ($newDefaultAddress) {
            $newDefaultAddress->update(['default_flag' => true]);
        }
        return $newDefaultAddress;
    }
}

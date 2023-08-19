<?php

namespace App\Repositories;

interface IAccountRepository
{
    public function createCustomer(array $attributes);
    public function createCustomerCart(int $customerId);
    public function updateCustomer(array $attributes, int $customerId);

    public function addCustomerAddress(array $attributes);
    public function updateCustomerAddress(array $attributes, int $addressId);
    public function deleteCustomerAddressById(int $addressId);

    public function changeDefaultCustomerAddress(int $newDefaultAddressId, int $customerId);
}

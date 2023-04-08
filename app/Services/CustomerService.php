<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    public function getCustomerAddresses($customerId)
    {
        return CustomerAddress::where(['customer_id' => $customerId])->get();
    }
}

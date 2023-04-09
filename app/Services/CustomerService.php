<?php

namespace App\Services;

use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    public function getCustomerAddresses($customerId)
    {
        return CustomerAddress::where(['customer_id' => $customerId])->get();
    }
}

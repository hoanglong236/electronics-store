<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    public function register($registerProperties)
    {
        Customer::create([
            'name' => $registerProperties['name'],
            'phone' => $registerProperties['phone'],
            'gender' => $registerProperties['gender'],
            'email' => $registerProperties['email'],
            'password' => Hash::make($registerProperties['password']),
        ]);
    }

    public function login($loginProperties)
    {
        return Auth::guard('customer')->attempt($loginProperties);
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
    }
}

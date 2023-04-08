<?php

namespace App\Http\Controllers;

use App\Common\Constants;
use App\Services\CommonService;
use App\Services\CustomerService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    private $commonService;
    private $customerService;
    private $orderService;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->customerService = new CustomerService();
        $this->orderService = new OrderService();
    }

    public function showInfo()
    {
        $customer = Auth::guard('customer')->user();
        $data = [
            'pageTitle' => 'Customer Account Information',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'customerAddresses' => $this->customerService->getCustomerAddresses($customer->id),
        ];
        return view('pages.customer.customer-info-page', ['data' => $data]);
    }

    public function showOrders()
    {
        $customer = Auth::guard('customer')->user();
        $customOrders = $this->orderService->getCustomOrdersByCustomerId($customer->id);

        $data = [
            'pageTitle' => 'Customer Account Information',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'customOrders' => $customOrders,
        ];
        return view('pages.customer.orders-page', ['data' => $data]);
    }
}

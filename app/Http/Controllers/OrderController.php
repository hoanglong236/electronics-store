<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $commonService;
    private $orderService;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $customOrders = $this->orderService->getCustomOrdersByCustomerId($customer->id);

        $data = [
            'pageTitle' => 'Customer Account Information',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'customOrders' => $customOrders,
        ];
        return view('pages.order.orders-page', ['data' => $data]);
    }

    public function showDetails($orderId)
    {
        $customOrder = $this->orderService->getCustomOrderByOrderId($orderId);
        $customOrderItems = $this->orderService->getCustomOrderItemsByOrderId($orderId);
        $data = [
            'pageTitle' => 'Order details',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'customOrder' => $customOrder,
            'customOrderItems' => $customOrderItems,
        ];
        return view('pages.order.order-details-page', ['data' => $data]);
    }
}

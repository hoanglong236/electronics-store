<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $commonService;
    private $cartService;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->cartService = new CartService();
    }

    public function index()
    {
        $categoryTrees = $this->commonService->getCategoryTrees();
        $customer = Auth::guard('customer')->user();
        $customCartItems = $this->cartService->getCustomCartItemsByCustomerId($customer->id);

        $data = [
            'pageTitle' => 'Cart',
            'categoryTrees' => $categoryTrees,
            'customCartItems' => $customCartItems,
        ];

        return view('pages.cart.cart-page', ['data' => $data]);
    }
}

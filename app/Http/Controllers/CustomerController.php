<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $commonService;

    public function __construct()
    {
        $this->commonService = new CommonService();
    }

    public function login()
    {
    }

    public function register()
    {
        $data = [
            'pageTitle' => 'Register account',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
        ];
        return view('pages.account.register-page', ['data' => $data]);
    }

    public function logout()
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use App\Services\HomeService;

class HomeController extends Controller
{
    private $commonService;
    private $homeService;

    public function __construct(HomeService $homeService, CommonService $commonService)
    {
        $this->homeService = $homeService;
        $this->commonService = $commonService;
    }

    public function index()
    {
        $data['pageTitle'] = 'Home page';
        $data['categoryTrees'] = $this->commonService->getCategoryTrees();

        $data['popularProducts'] = $this->homeService->getPopularProducts();
        $data['featuredProducts'] = $this->homeService->getFeaturedProducts();
        $data['latestProducts'] = $this->homeService->getLatestProducts();

        $data['topCategories'] = $this->homeService->getTopCategories();
        $data['productsOfTopCategories'] = $this->homeService->getProductsOfTopCategories();

        return view('pages.home.home-page', ['data' => $data]);
    }
}

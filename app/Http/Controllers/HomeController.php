<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeService;

    public function __construct() {
        $this->homeService = new HomeService();
    }

    public function index() {
        $data['pageTitle'] = 'Home page';
        $data['categoryTrees'] = $this->homeService->getCategoryTrees();
        $data['popularProducts'] = $this->homeService->getPopularProducts();
        $data['featuredProducts'] = $this->homeService->getFeaturedProducts();
        $data['latestProducts'] = $this->homeService->getLatestProducts();

        return view('pages.home.home-page', ['data' => $data]);
    }
}

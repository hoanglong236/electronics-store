<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $commonService;
    private $productService;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->productService = new ProductService();
    }

    public function findByCategorySlug($categorySlug)
    {
        $data = [
            'pageTitle' => 'Products',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'products' => $this->productService->findProductsByCategorySlug($categorySlug),
        ];

        return view('pages.product.products-page', ['data' => $data]);
    }
}

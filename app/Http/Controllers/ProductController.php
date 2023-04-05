<?php

namespace App\Http\Controllers;

use App\Common\Constants;
use App\DataFilterConstants\ProductSorterConstants;
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
        $data = $this->getCommonDataForProductsPage();
        $data['brands'] = $this->productService->findProductBrandsByCategorySlug($categorySlug);
        $data['products'] = $this->productService->findProductsByCategorySlug($categorySlug);

        return view('pages.product.products-page', ['data' => $data]);
    }

    private function getCommonDataForProductsPage()
    {
        return [
            'pageTitle' => 'Products',
            'categoryTrees' => $this->commonService->getCategoryTrees(),
            'bestSellerProducts' => $this->productService->getBestSellerProducts(
                Constants::BEST_SELLER_PRODUCTS_SIDEBAR_COUNT
            ),
            'sorterOptions' => ProductSorterConstants::toArray(),
        ];
    }
}

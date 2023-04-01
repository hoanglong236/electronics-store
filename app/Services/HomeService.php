<?php

namespace App\Services;

use App\Common\Constants;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class HomeService
{
    public function getCategoryTrees()
    {
        $categoryTrees = [];
        $categories = Category::where([
            'delete_flag' => false,
            'parent_id' => null,
        ])->get();

        foreach ($categories as $category) {
            array_push($categoryTrees, $this->getCategoryTree($category));
        }

        return $categoryTrees;
    }

    private function getCategoryTree($category)
    {
        $categoryTree = $category->getAttributes();
        $categoryTree['children'] = [];

        $categoryChildren = Category::where([
            'delete_flag' => false,
            'parent_id' => $category->id,
        ])->get();
        foreach ($categoryChildren as $categoryChild) {
            array_push($categoryTree['children'], $this->getCategoryTree($categoryChild));
        }

        return $categoryTree;
    }

    // TODO: handle this
    public function getPopularProducts()
    {
        return Product::where([
            'delete_flag' => false,
        ])->inRandomOrder()->limit(Constants::TOP_PRODUCT_COUNT)->get();
    }

    // TODO: handle this
    public function getFeaturedProducts()
    {
        return Product::where([
            'delete_flag' => false,
        ])->inRandomOrder()->limit(Constants::TOP_PRODUCT_COUNT)->get();
    }

    // TODO: handle this
    public function getLatestProducts()
    {
        return Product::where([
            'delete_flag' => false,
        ])->orderBy('created_at')->limit(Constants::TOP_PRODUCT_COUNT)->get();
    }

    public function getTopCategories()
    {
        return Category::where([
            'delete_flag' => false,
        ])->limit(Constants::TOP_CATEGORY_COUNT)->get();
    }

    public function getProductsOfTopCategories()
    {
        $categories = $this->getTopCategories();
        $products = [];
        foreach ($categories as $category) {
            $products[$category->id] = $this->getProductByCategoryId($category->id);
        }
        return $products;
    }

    private function getProductByCategoryId($categoryId)
    {
        return Product::where([
            'delete_flag' => false,
            'category_id' => $categoryId
        ])->limit(Constants::TOP_PRODUCT_COUNT)->get();
    }

    public function getTopBrands() {
        return Brand::where([
            'delete_flag'=> false,
        ])->limit(Constants::TOP_BRAND_COUNT)->get();
    }
}

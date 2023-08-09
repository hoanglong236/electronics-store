<?php

namespace App\Repositories\Concretes;

use App\Common\Constants;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\IHomeRepository;

class HomeRepository implements IHomeRepository
{
    public function getRandomProducts()
    {
        return Product::where(['delete_flag' => false])
            ->inRandomOrder()
            ->limit(Constants::TOP_PRODUCT_COUNT)
            ->get();
    }

    public function getTopCategories()
    {
        return Category::where(['delete_flag' => false])
            ->limit(Constants::TOP_CATEGORY_COUNT)
            ->get();
    }

    public function getProductsByCategoryId($categoryId)
    {
        return Product::where([
            'delete_flag' => false,
            'category_id' => $categoryId
        ])
            ->orderBy('id')
            ->limit(Constants::TOP_PRODUCT_COUNT)
            ->get();
    }
}

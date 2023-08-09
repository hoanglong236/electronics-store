<?php

namespace App\Repositories\Concretes;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\IHomeRepository;

class HomeRepository implements IHomeRepository
{
    public function getRandomProducts(int $numberItems)
    {
        return Product::where(['delete_flag' => false])
            ->inRandomOrder()
            ->limit($numberItems)
            ->get();
    }

    public function getTopCategories(int $numberItems)
    {
        return Category::where(['delete_flag' => false])
            ->limit($numberItems)
            ->get();
    }

    public function getProductsByCategoryId(int $categoryId, int $numberItems)
    {
        return Product::where([
            'delete_flag' => false,
            'category_id' => $categoryId
        ])
            ->orderBy('id')
            ->limit($numberItems)
            ->get();
    }
}

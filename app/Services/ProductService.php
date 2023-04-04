<?php

namespace App\Services;

use App\Common\Constants;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function findProductsByCategorySlug($categorySlug)
    {
        return DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*')
            ->where([
                'products.delete_flag' => false,
                'categories.slug' => $categorySlug,
            ])
            ->paginate(Constants::ITEMS_PER_PRODUCTS_PAGE);
    }

    public function searchProducts()
    {
    }
}

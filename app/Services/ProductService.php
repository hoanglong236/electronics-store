<?php

namespace App\Services;

use App\Common\Constants;
use App\Models\Product;
use App\Models\ProductImage;
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
                'categories.delete_flag' => false,
                'categories.slug' => $categorySlug,
            ])
            ->paginate(Constants::ITEMS_PER_PRODUCTS_PAGE);
    }

    public function findProductBrandsByCategorySlug($categorySlug)
    {
        return DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->distinct()
            ->select('brands.*')
            ->where([
                'products.delete_flag' => false,
                'categories.delete_flag' => false,
                'categories.slug' => $categorySlug,
                'brands.delete_flag' => false,
            ])
            ->get();
    }

    public function searchProducts()
    {
    }

    public function getBestSellerProducts($productCount)
    {
        return Product::where(['delete_flag' => false])->limit($productCount)->get();
    }

    public function findProductBySlug($productSlug) {
        return Product::where(['delete_flag' => false, 'slug' => $productSlug])->first();
    }

    public function getProductImagesByProductId($productId) {
        return ProductImage::where('product_id', $productId)->get();
    }
}

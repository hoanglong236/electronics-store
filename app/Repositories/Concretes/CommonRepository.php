<?php

namespace App\Repositories\Concretes;

use App\Models\Cart;
use App\Models\Category;
use App\Models\CustomerAddress;
use App\Repositories\ICommonRepository;

class CommonRepository implements ICommonRepository
{
    public function getRootCategories(int $numberItems)
    {
        return Category::where([
            'delete_flag' => false,
            'parent_id' => null,
        ])
            ->orderBy('id')
            ->limit($numberItems)
            ->get();
    }

    public function getChildCategoriesByParentCategoryId(int $parentCategoryId)
    {
        return Category::where([
            'delete_flag' => false,
            'parent_id' => $parentCategoryId,
        ])
            ->orderBy('id')
            ->get();
    }

    public function getCustomerAddressesByCustomerId(int $customerId)
    {
        return CustomerAddress::where(['customer_id' => $customerId])->get();
    }

    public function getCartIdByCustomerId(int $customerId)
    {
        return Cart::where('customer_id', $customerId)
            ->first()
            ->id;
    }
}

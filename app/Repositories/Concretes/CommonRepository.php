<?php

namespace App\Repositories\Concretes;

use App\Models\Category;
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
}

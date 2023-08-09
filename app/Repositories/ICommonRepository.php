<?php

namespace App\Repositories;

interface ICommonRepository
{
    public function getRootCategories(int $numberItems);
    public function getChildCategoriesByParentCategoryId(int $parentCategoryId);
}

<?php

namespace App\Repositories;

interface ICommonRepository
{
    public function getRootCategories(int $numberItems);
    public function getChildCategoriesByParentCategoryId(int $parentCategoryId);
    public function getCustomerAddressesByCustomerId(int $customerId);
    public function getCartIdByCustomerId(int $customerId);
}

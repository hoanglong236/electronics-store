<?php

namespace App\Services;

use App\Constants\ConfigConstants;
use App\Models\Category;
use App\Repositories\ICommonRepository;
use Illuminate\Support\Facades\Auth;

class CommonService
{
    private $commonRepository;

    public function __construct(ICommonRepository $iCommonRepository)
    {
        $this->commonRepository = $iCommonRepository;
    }

    private function getCategoryTree(Category $category)
    {
        $categoryTree = $category->getAttributes();
        $categoryTree['children'] = [];

        $childCategories = $this->commonRepository->getChildCategoriesByParentCategoryId($category->id);
        foreach ($childCategories as $childCategory) {
            $categoryTree['children'][] = $this->getCategoryTree($childCategory);
        }
        return $categoryTree;
    }

    public function getCategoryTrees()
    {
        $categoryTrees = [];
        $categories = $this->commonRepository->getRootCategories(ConfigConstants::NUMBER_ROOT_CATEGORIES);

        foreach ($categories as $category) {
            $categoryTrees[] = $this->getCategoryTree($category);
        }
        return $categoryTrees;
    }

    public function getCurrentLoggedInCustomer()
    {
        return Auth::guard('customer')->user();
    }

    public function getCustomerAddressesByCustomerId(int $customerId)
    {
        return $this->commonRepository->getCustomerAddressesByCustomerId($customerId);
    }

    public function getCartIdByCustomerId(int $customerId) {
        return $this->commonRepository->getCartIdByCustomerId($customerId);
    }
}

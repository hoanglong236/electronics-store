<?php

namespace App\Services;

use App\Constants\ConfigConstants;
use App\Repositories\IHomeRepository;

class HomeService
{
    private $homeRepository;

    public function __construct(IHomeRepository $iHomeRepository)
    {
        $this->homeRepository = $iHomeRepository;
    }

    // TODO: handle this
    public function getPopularProducts()
    {
        return $this->homeRepository->getRandomProducts(ConfigConstants::NUMBER_PRODUCTS_PER_SECTION);
    }

    // TODO: handle this
    public function getFeaturedProducts()
    {
        return $this->homeRepository->getRandomProducts(ConfigConstants::NUMBER_PRODUCTS_PER_SECTION);
    }

    // TODO: handle this
    public function getLatestProducts()
    {
        return $this->homeRepository->getRandomProducts(ConfigConstants::NUMBER_PRODUCTS_PER_SECTION);
    }

    public function getTopCategories()
    {
        return $this->homeRepository->getTopCategories(ConfigConstants::NUMBER_TOP_CATEGORIES);
    }

    public function getProductsOfTopCategories()
    {
        $categories = $this->getTopCategories();
        $products = [];
        foreach ($categories as $category) {
            $products[$category->id] = $this->homeRepository
                ->getProductsByCategoryId($category->id, ConfigConstants::NUMBER_PRODUCTS_PER_SECTION);
        }
        return $products;
    }
}

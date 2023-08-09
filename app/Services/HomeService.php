<?php

namespace App\Services;

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
        return $this->homeRepository->getRandomProducts();
    }

    // TODO: handle this
    public function getFeaturedProducts()
    {
        return $this->homeRepository->getRandomProducts();
    }

    // TODO: handle this
    public function getLatestProducts()
    {
        return $this->homeRepository->getRandomProducts();
    }

    public function getTopCategories()
    {
        return $this->homeRepository->getTopCategories();
    }

    public function getProductsOfTopCategories()
    {
        $categories = $this->getTopCategories();
        $products = [];
        foreach ($categories as $category) {
            $products[$category->id] = $this->homeRepository->getProductsByCategoryId($category->id);
        }
        return $products;
    }
}

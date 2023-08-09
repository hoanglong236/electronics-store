<?php

namespace App\Repositories;

interface IHomeRepository
{
    public function getRandomProducts();
    public function getTopCategories();
    public function getProductsByCategoryId(int $categoryId);
}

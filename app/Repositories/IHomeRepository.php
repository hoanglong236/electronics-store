<?php

namespace App\Repositories;

interface IHomeRepository
{
    public function getRandomProducts(int $numberItems);
    public function getTopCategories(int $numberItems);
    public function getProductsByCategoryId(int $categoryId, int $numberItems);
}

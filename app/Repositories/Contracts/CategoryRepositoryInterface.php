<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function search(array $data);
    public function productsByCategoryId($id);
}

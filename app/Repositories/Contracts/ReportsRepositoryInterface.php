<?php

namespace App\Repositories\Contracts;

interface ReportsRepositoryInterface
{
    public function byMonths(int $year):array;
}

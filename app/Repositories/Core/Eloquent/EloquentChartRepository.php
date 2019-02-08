<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ChartRepositoryInterface;

class EloquentChartRepository extends BaseEloquentRepository implements ChartRepositoryInterface
{
    public function entity()
    {
        // return Chart::class;
    }
}

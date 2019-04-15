<?php

namespace App\Repositories\Core\QueryBuilder;

use DB;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use App\Charts\ReportsChart;
use App\Enum\Enum;

class QueryBuilderReportsRepository extends BaseQueryBuilderRepository implements ReportsRepositoryInterface
{
    protected $table = 'orders';

    public function byMonths(int $year):array
    {
        $dataset = $this->db
                    ->table($this->tb)
                    ->select(DB::raw('sum(total) as sums'), DB::raw('MONTH(date) as month'))
                    ->groupBy(DB::raw('MONTH(date)'))
                    ->whereYear('date', $year)
                    ->pluck('sums')
                    ->toArray();

        /*
        $dataset = [];
        foreach ($reports as $key => $value) {
            $dataset[] = $value->sums;
        }
        */

        return $dataset;
    }

    public function getReports(int $yearStart = null, int $yearEnd = null, String $type = 'bar')
    {
        $chart = app(ReportsChart::class);

        $yearStart = $yearStart ?? date('Y') - 3;
        $yearEnd = $yearEnd ?? date('Y');

        $chart->labels(Enum::months());

        for ($year=$yearStart; $year <= $yearEnd; $year++) { 
            $color = '#' . dechex(rand(0x000000, 0xFFFFFF));
            

            $chart->dataset($year, $type, $this->byMonths($year))
                    ->options([
                        'color'             => $color,
                        'backgroundColor'   => $color
                    ]);;
        }

        return $chart;
    }
}

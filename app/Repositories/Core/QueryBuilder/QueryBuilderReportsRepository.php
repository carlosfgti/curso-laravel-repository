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

    public function getDataYears():array
    {
        $data = $this->db
                    ->table($this->tb)
                    ->select(
                        DB::raw('sum(total) as total'),
                        DB::raw("EXTRACT(YEAR from date) as year")
                    )
                    ->groupBy(DB::raw('YEAR(date)'))
                    // ->whereYear('date', $year)
                    ->get();

        $backgrounds = $data->map(function ($value, $key) {
            return '#' . dechex(rand(0x000000, 0xFFFFFF));
        });

        $values = $data->map(function ($order, $key) {
            return number_format($order->total, 0, '', '');
        });

        return [
            'labels'        => $data->pluck('year'),
            'values'        => $values, // $data->pluck('total'),
            'backgrounds'   => $backgrounds,
        ];
    }


    public function getReportsMonthByYear(int $year):array
    {
        $data = $this->db
                    ->table($this->tb)
                    ->select(
                        DB::raw('sum(total) as total'),
                        DB::raw("EXTRACT(MONTH from date) as months")
                    )
                    ->groupBy(DB::raw('MONTH(date)'))
                    ->whereYear('date', $year)
                    ->get();

        $backgrounds = $data->map(function ($value, $key) {
            return '#' . dechex(rand(0x000000, 0xFFFFFF));
        });

        $values = $data->map(function ($order, $key) {
            return number_format($order->total, 0, '', '');
        });

        return [
            'labels'        => $data->pluck('months'),
            'values'        => $values, // $data->pluck('total'),
            'backgrounds'   => $backgrounds,
        ];
    }
}

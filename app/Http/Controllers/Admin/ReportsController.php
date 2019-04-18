<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\ReportsChart;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use App\Enum\Enum;

class ReportsController extends Controller
{
    private $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function months(ReportsChart $chart)
    {
        $chart->labels(Enum::months());

        $chart->dataset('2017', 'bar', $this->repository->byMonths(2017));

        $chart->dataset('2018', 'bar', $this->repository->byMonths(2018))
        ->options([
            'backgroundColor' => '#999'
        ]);

        return view('admin.charts.chart', compact('chart'));
    }

    public function months2()
    {
        $chart = $this->repository->getReports(2016, 2018);

        return view('admin.charts.chart', compact('chart'));
    }

    public function year(ReportsChart $chart)
    {
        $response = $this->repository->getDataYears();

        $chart->labels($response['labels'])
                ->dataset('Relatórios de vendas', 'bar', $response['values'])
                // ->dataset('Relatórios de vendas', 'line', $response['values'])
                ->color('black')
                ->backgroundColor($response['backgrounds']);
                // ->backgroundColor('blue');

        $chart->options([
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'callback' => $chart->rawObject('myCallback')
                        ]
                    ]
                ]
            ]
        ]);

        return view('admin.charts.chart', compact('chart'));
    }

    public function vue()
    {
        return view('admin.charts.vue');
    }
}

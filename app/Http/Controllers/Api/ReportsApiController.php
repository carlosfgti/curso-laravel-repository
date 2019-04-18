<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class ReportsApiController extends Controller
{
    protected $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function months(Request $request)
    {
        $year = (int) $request->input('year', 2018);

        $response = $this->repository->getReportsMonthByYear($year);

        return response()->json($response);
    }
}

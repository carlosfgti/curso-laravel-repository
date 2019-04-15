<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    private $user;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user = User::first();

        for ($year=(date('Y') - 5); $year <= date('Y'); $year++) { 
            for ($month=1; $month <= 12; $month++) { 
                // $data = "{$year}-{$month}-01";
                $data = Carbon::createFromFormat('Y-m-d H', "{$year}-{$month}-01 22");

                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
            }
        }
    }

    public function saveOrder($data)
    {
        $this->user->orders()->create([
            'total'             => rand(0, 10) * 12.2,
            'identify'          => uniqid(date('YmdHis')),
            'code'              => uniqid(date('YmdHis')),
            'status'            => 1,
            'payment_method'    => 2,
            'date'              => $data
        ]);
    }
}

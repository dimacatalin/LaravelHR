<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\MonthlyStatistic;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateMonthlyStatistic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-monthly-statistic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly statistic';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
//        $otherStatisticThisMonth = MonthlyStatistic::whereMonth('date', Carbon::now()->format('m'));

        //if there is another statistic generated this month, do not generate another
//        if (!$otherStatisticThisMonth){
            $employees = Employee::where('is_active', true)->get();

            $amount_earned = 0;
            $amount_spent = 0;

            foreach ($employees as $employee) {
                $amount_spent += $employee->salary->gross_amount;
                $amount_earned += $employee->project->rate_per_month_per_employee;
            }

            MonthlyStatistic::create([
                'date' => Carbon::now()->format('Y-d-m'),
                'amount_earned' => $amount_earned,
                'amount_spent' => $amount_spent,
                'metadata' => json_encode($employees)
            ]);
//        }
    }
}

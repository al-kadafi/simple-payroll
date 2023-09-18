<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Slip;

class GenerateMonthlySlip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:monthly-slip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run monthly-slip job';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //get filter data
        $filter = Carbon::now();

        //get year and month value as number
        $year = $filter->year;
        $month = $filter->month;

        // Calculate the last day of the month
        $lastDay = $filter->endOfMonth();

        // Format the last day as 'Y-m-d'
        $formatted_date = $lastDay->format('Y-m-d');

        //get all employee
        $employees = Employee::whereDate('join_date', '<=', $formatted_date)->get();

        foreach ($employees as $employee) {
            $exist = Slip::where('employee_id', $employee->id)
                ->whereMonth('month_period', $month)
                ->whereYear('month_period', $year)
                ->first();

            //check employee slip on selected month
            if (empty($exist)) {
                //create slip data with status draft
                Slip::create(['employee_id' => $employee->id, 'month_period' => $formatted_date]);
            }
        }

        $this->info('Monthly slip data has been generated.');
    }
}

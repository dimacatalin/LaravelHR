<?php

namespace App\Http\Controllers;

use App\Models\MonthlyStatistic;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{

    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $stats = MonthlyStatistic::orderBy('date', 'ASC')->get();

        $labels = [];
        $data_earned = [];
        $data_spent = [];
        $data_profit = [];

        foreach ($stats as $stat) {
            array_push($labels, Carbon::parse(date('m-d-Y', strtotime($stat->date)))->format('M Y'));
            array_push($data_earned, $stat->amount_earned);
            array_push($data_spent, $stat->amount_spent);
            array_push($data_profit, $stat->amount_earned - $stat->amount_spent);
        }

        return view('dashboard', compact( 'labels', 'data_earned', 'data_spent', 'data_profit'));
    }

    public function export(){
        
    }

}

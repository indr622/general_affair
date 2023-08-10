<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $chartjs = app()->chartjs
        //     ->name('barChartTest')
        //     ->type('bar')
        //     ->size(['width' => 400, 'height' => 200])
        //     ->labels(['Office Boy', 'Security'])
        //     ->datasets([
        //         [
        //             "label" => "My First dataset",
        //             'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
        //             'data' => [69, 59]
        //         ],
        //         [
        //             "label" => "My First dataset",
        //             'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
        //             'data' => [65, 12]
        //         ]
        //     ])
        //     ->options([]);
        return view('home');
    }
}

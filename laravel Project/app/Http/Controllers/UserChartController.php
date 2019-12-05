<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usersChart = new UserChart;
        $usersChart->title('Users by Months', 30, "rgb(255, 99, 132)", true, 'Helvetica Neue');
        $usersChart->barwidth(0.0);
        $usersChart->displaylegend(false);
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1)
            ->dashed([5]);
        return view('users', ['usersChart' => $usersChart]);

    }

}

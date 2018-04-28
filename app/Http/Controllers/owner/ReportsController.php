<?php


namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function dailyReport()
    {
        $table = \Lava::DataTable();


        $table->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(array('Check Reviews', 5))
            ->addRow(array('Watch Trailers', 2))
            ->addRow(array('See Actors Other Work', 4))
            ->addRow(array('Settle Argument', 89));


        $donutchart = \Lava::DonutChart('IMDB', $table, [
                    'title' => 'Reasons I visit IMDB'
                ]);

        return view('owner.report.report');
    }


    
}




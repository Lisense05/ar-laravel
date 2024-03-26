<?php

namespace App\Http\Controllers;

use App\Models\AdminDuty;
use App\Models\AdminReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminStatController extends Controller
{
    public function index(Request $request)
    {

        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        if ($startDate && $endDate) {

            
            if ($startDate === $endDate) {
                if (date('Y-m-d',$startDate) == date('Y-m-d',strtotime(('today')))) {
                    $startDate -= 86400;
                } else {
                    $endDate += 86400;
                }
            }

            $data = AdminDuty::whereBetween('savedate', [$startDate, $endDate])->get();
        } else {

            $endDate = strtotime('today');
            $startDate = strtotime('yesterday');

            $data = AdminDuty::whereBetween('savedate', [$endDate, $startDate])->get();
        }


        $chartData = [];
        $sumMinutes = 0;
        foreach ($data as $row) {
            $date = date('Y-m-d', $row->savedate);

            if (!isset($chartData[$date])) {
                $chartData[$date] = [];
            }
            if (!isset($chartData[$date][$row->identifier])) {
                $chartData[$date][$row->identifier] = 0;
            }
            $chartData[$date][$row->identifier] += $row->minutes;
            $sumMinutes += $row->minutes;
        }

        if (!Cache::has('admin_reports')) {
            $data2 = AdminReports::all();
            $chartDataCircle = [];
            $fullSumCircle = 0;

            foreach ($data2 as $item) {
                if (!isset($chartDataCircle[$item->identifier])) {
                    $chartDataCircle[$item->identifier] = 0;
                }

                $chartDataCircle[$item->identifier] += $item->count;
                $fullSumCircle += $item->count;
            }

            $top5 = collect($chartDataCircle)->sortDesc()->take(5);
            
            

            $seriesCData = array_values($chartDataCircle);
            $labelsCData = array_keys($chartDataCircle);
            $toCache = [
                'seriesCData' => $seriesCData,
                'labelsCData' => $labelsCData,
                'fullSumCircle' => $fullSumCircle,
                'top5' => $top5,
            ];
            Cache::put('admin_reports', $toCache, now()->addMinutes(10));

            error_log('with Database!');
        } else {
            $cachedData = Cache::get('admin_reports');
            $seriesCData = $cachedData['seriesCData'];
            $labelsCData = $cachedData['labelsCData'];
            $fullSumCircle = $cachedData['fullSumCircle'];
            $top5 = $cachedData['top5'];
            error_log('With cache!');
        }

        $startDate = date('Y-m-d', $startDate);
        $endDate = date('Y-m-d', $endDate);
        return view('panels.adminstat', compact('chartData', 'sumMinutes', 'startDate', 'endDate', 'fullSumCircle', 'top5'))->with(
            [
                'seriesCData' => json_encode($seriesCData),
                'labelsCData' => json_encode($labelsCData)
            ]
        );
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Support\Facades\DB;

class AdminAnalyticsController extends Controller
{
    public function index()
    {
        $totalLast30 = PageView::where('visited_at', '>=', now()->subDays(30))->count();

        $today = PageView::whereDate('visited_at', today())->count();

        $topPages = PageView::select('page_url', DB::raw('COUNT(*) as visits'))
            ->where('visited_at', '>=', now()->subDays(30))
            ->groupBy('page_url')
            ->orderByDesc('visits')
            ->limit(10)
            ->get();

        $last14 = collect();
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $last14[$date] = 0;
        }

        PageView::select(DB::raw('DATE(visited_at) as date'), DB::raw('COUNT(*) as visits'))
            ->where('visited_at', '>=', now()->subDays(13)->startOfDay())
            ->groupBy('date')
            ->get()
            ->each(function ($row) use (&$last14) {
                $last14[$row->date] = $row->visits;
            });

        return view('admin.analytics.index', [
            'title'       => 'Analytics',
            'totalLast30' => $totalLast30,
            'today'       => $today,
            'topPages'    => $topPages,
            'last14'      => $last14,
        ]);
    }
}

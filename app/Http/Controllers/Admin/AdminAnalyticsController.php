<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Support\Facades\DB;

class AdminAnalyticsController extends Controller
{
    private const SECTIONS = [
        '/'                 => 'Home',
        '/news'             => 'News',
        '/research'         => 'Research',
        '/departments'      => 'Departments',
        '/lecturers'        => 'Lecturers',
        '/student-projects' => 'Student Projects',
        '/about'            => 'About',
    ];

    public function index()
    {
        $today     = PageView::whereDate('visited_at', today())->count();
        $thisWeek  = PageView::where('visited_at', '>=', now()->startOfWeek())->count();
        $thisMonth = PageView::where('visited_at', '>=', now()->startOfMonth())->count();

        // Visits per day — last 30 days
        $last30 = collect();
        for ($i = 29; $i >= 0; $i--) {
            $last30[now()->subDays($i)->toDateString()] = 0;
        }
        PageView::select(DB::raw('DATE(visited_at) as date'), DB::raw('COUNT(*) as visits'))
            ->where('visited_at', '>=', now()->subDays(29)->startOfDay())
            ->groupBy('date')
            ->get()
            ->each(fn($row) => $last30[$row->date] = $row->visits);

        // Top 10 pages — last 30 days
        $topPages = PageView::select('page_url', DB::raw('COUNT(*) as visits'))
            ->where('visited_at', '>=', now()->subDays(30))
            ->groupBy('page_url')
            ->orderByDesc('visits')
            ->limit(10)
            ->get();

        // Section breakdown — last 30 days
        $urlCounts = PageView::select('page_url', DB::raw('COUNT(*) as visits'))
            ->where('visited_at', '>=', now()->subDays(30))
            ->groupBy('page_url')
            ->get()
            ->keyBy('page_url');

        $sections = array_fill_keys(array_values(self::SECTIONS), 0);
        $sections['Other'] = 0;

        foreach ($urlCounts as $url => $row) {
            $matched = false;
            foreach (self::SECTIONS as $prefix => $label) {
                $matches = $prefix === '/' ? $url === '/' : str_starts_with($url, $prefix);
                if ($matches) {
                    $sections[$label] += $row->visits;
                    $matched = true;
                    break;
                }
            }
            if (!$matched) {
                $sections['Other'] += $row->visits;
            }
        }

        $sections = collect($sections);

        return view('admin.analytics.index', [
            'title'      => 'Analytics',
            'today'      => $today,
            'thisWeek'   => $thisWeek,
            'thisMonth'  => $thisMonth,
            'last30'     => $last30,
            'topPages'   => $topPages,
            'sections'   => $sections,
        ]);
    }
}

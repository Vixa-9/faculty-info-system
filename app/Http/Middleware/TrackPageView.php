<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;

class TrackPageView
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->isMethod('GET') && !$request->is('admin*') && !$request->is('api*')) {
            PageView::create([
                'page_url'   => $request->path() === '/' ? '/' : '/' . $request->path(),
                'page_title' => null,
                'ip_hash'    => md5($request->ip()),
                'visited_at' => now(),
            ]);
        }

        return $response;
    }
}

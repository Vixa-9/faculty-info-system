<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixMenuLinks extends Command
{
    protected $signature = 'menus:fix-links';
    protected $description = 'Replace http://localhost/ with / in menus.link';

    public function handle()
    {
        $rows = DB::table('menus')
            ->where('link', 'like', 'http://%')
            ->get();

        $count = 0;

        foreach ($rows as $menu) {
            $newLink = preg_replace('#^https?://[^/]+/#', '/', $menu->link);

            if ($newLink === $menu->link) {
                continue;
            }

            DB::table('menus')->where('id', $menu->id)->update(['link' => $newLink]);
            $this->line("  #{$menu->id} : {$menu->link} → {$newLink}");
            $count++;
        }

        $this->info("Done. {$count} row(s) updated.");
    }
}

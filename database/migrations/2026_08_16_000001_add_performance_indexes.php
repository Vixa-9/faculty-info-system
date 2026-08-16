<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerformanceIndexes extends Migration
{
    public function up()
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->index('visited_at');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->index('active');
            $table->index('published_at');
        });

        Schema::table('research_activities', function (Blueprint $table) {
            $table->index('type');
        });

        Schema::table('student_projects', function (Blueprint $table) {
            $table->index('department');
            $table->index('year');
        });
    }

    public function down()
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->dropIndex(['visited_at']);
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['active']);
            $table->dropIndex(['published_at']);
        });

        Schema::table('research_activities', function (Blueprint $table) {
            $table->dropIndex(['type']);
        });

        Schema::table('student_projects', function (Blueprint $table) {
            $table->dropIndex(['department']);
            $table->dropIndex(['year']);
        });
    }
}

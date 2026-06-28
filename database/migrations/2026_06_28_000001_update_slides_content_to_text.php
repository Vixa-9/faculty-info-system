<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSlidesContentToText extends Migration
{
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->text('content')->nullable()->change();
            $table->string('url', 255)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->string('content', 255)->nullable(false)->change();
            $table->string('url', 255)->nullable(false)->change();
        });
    }
}

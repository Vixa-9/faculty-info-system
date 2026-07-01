<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageViewsTable extends Migration
{
    public function up()
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('page_url');
            $table->string('page_title')->nullable();
            $table->string('ip_hash');
            $table->timestamp('visited_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_views');
    }
}

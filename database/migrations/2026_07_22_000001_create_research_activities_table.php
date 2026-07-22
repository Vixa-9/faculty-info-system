<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('research_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->text('description')->nullable();
            $table->string('authors')->nullable();
            $table->date('date')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->string('department')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_activities');
    }
}

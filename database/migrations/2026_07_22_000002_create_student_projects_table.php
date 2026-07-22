<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('student_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('team_members')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('department')->nullable();
            $table->year('year')->nullable();
            $table->string('award')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_projects');
    }
}

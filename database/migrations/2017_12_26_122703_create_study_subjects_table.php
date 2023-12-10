<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudySubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('success_score');
            $table->integer('final_score');
            $table->unsignedInteger('department_id')->index();
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_subjects');
    }
}

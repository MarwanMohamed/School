<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->default(1);
            $table->foreign('branch_id')->references('id')
                ->on('branches')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name');
            $table->integer('max');
            $table->string('start_registration');
            $table->string('end_registration');
            $table->string('start_study');
            $table->string('end_study');
            $table->string('first_installment');

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
        Schema::dropIfExists('student_groups');
    }
}

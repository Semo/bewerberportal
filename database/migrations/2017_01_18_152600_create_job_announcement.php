<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_reference')->nullable();
            $table->string('place_of_employment')->nullable();
            $table->string('wage_group')->nullable();
            $table->string('career')->nullable();
            $table->string('remit')->nullable();
            $table->mediumText('requirements')->nullable();
            $table->mediumText('comments')->nullable();
            $table->string('time_limit')->nullable();
            $table->integer('version')->default(1);
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
        Schema::dropIfExists('job');
    }
}

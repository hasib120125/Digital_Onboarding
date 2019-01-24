<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetLeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_leader', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('designation', 50)->nullable();
            $table->string('division', 50)->nullable();
            $table->string('department', 50)->nullable();
            $table->string('picture', 100)->nullable();
            $table->string('short_profile', 100)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('meet_leader');
    }
}

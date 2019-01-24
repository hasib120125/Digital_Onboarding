<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guideline', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guideline_type', 100)->nullable();
            $table->string('file_type', 100)->nullable();
            $table->string('file_location', 100)->nullable();
            $table->string('message', 1000)->nullable();
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
        Schema::dropIfExists('guideline');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobiCulturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robi_cultures', function (Blueprint $table) {
            $table->increments('id',10)->unsigned();
            $table->string('file_type',100)->nullable();
            $table->string('file_location',100)->nullable();
            $table->text('message')->nullable();
            $table->string('status',20)->nullable();
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
        Schema::dropIfExists('robi_cultures');
    }
}

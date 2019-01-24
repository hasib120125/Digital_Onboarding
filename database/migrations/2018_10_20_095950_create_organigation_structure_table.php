<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganigationStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organigation_structure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_type', 100)->nullable();
            $table->string('file_location', 100)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('created_by' , 50)->nullable();
            $table->string('updated_by', 50)->nullable();
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
        Schema::dropIfExists('organigation_structure');
    }
}

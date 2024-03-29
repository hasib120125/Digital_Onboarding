<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('division');
            $table->string('file_type', 100)->nullable();
            $table->string('file_location', 100)->nullable();
            $table->string('message', 1000)->nullable();
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
        Schema::dropIfExists('division_messages');
    }
}

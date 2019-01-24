<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('checklist_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('created_by')->nullable()->nullable();
            $table->string('updated_by')->nullable()->nullable();
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
        Schema::dropIfExists('checklist_feedbacks');
    }
}

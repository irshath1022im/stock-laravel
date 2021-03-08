<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_id')->unique();
            $table->foreign('item_id')->references('items')->on('id');
            $table->integer('totalReceived')->default(0);
            $table->integer('totalIssued')->default(0);
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
        Schema::dropIfExists('item_summaries');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemQtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_qties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('qty');
            $table->unsignedBigInteger('transection_id');

            $table->foreign('item_id')->on('items')->references('id');
            $table->foreign('size_id')->on('item_sizes')->references('id');
            $table->foreign('transection_id')->on('transection_types')->references('id');
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
        Schema::dropIfExists('item_qties');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('delivery_id');
            $table->unsignedInteger('item_id')->index();
            $table->date('issued_date')->nullable();
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->unsignedInteger('staff_id')->index();
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('item_id')->references('id')->on('items');
            $table->integer('qty');
            $table->text('remark');
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
        Schema::dropIfExists('issued_items');
    }
}

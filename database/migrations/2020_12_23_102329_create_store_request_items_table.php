<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('store_request_id')->index();
            $table->unsignedInteger('item_id')->index();
            $table->integer('qty');
            $table->text('remark');
            $table->foreign('store_request_id')->references('id')->on('store_requests')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('store_request_items');
    }
}

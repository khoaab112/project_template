<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items_bonus', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id");
            $table->integer("product_id");
            $table->string("product_sku", 50);
            $table->integer("product_bonus_id");
            $table->string("product_bonus_sku", 50);
            $table->integer("bonus_qty");
            $table->timestamps();
            $table->softDeletes();
            $table->string('name',255)->nullable();
            $table->string('price', 30)->nullable();
            $table->string('link',255)->nullable();
            $table->index("order_id", "idx_order_items_bonus_order_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items_bonus');
    }
}

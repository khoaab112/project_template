<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_bonus', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("product_bonus_id");
            $table->string("product_sku", 20);
            $table->string("product_bonus_sku", 20);
            $table->integer("bonus_qty");
            $table->integer("time_start");
            $table->integer("time_end");
            $table->timestamps();

            $table->index("product_id", "idx_product_bonus_product_id");
            $table->index("product_bonus_id", "idx_product_bonus_product_bonus_id");
            $table->index("product_sku", "idx_product_bonus_product_sku");
            $table->index("time_start", "idx_product_bonus_time_start");
            $table->index("time_end", "idx_product_bonus_time_end");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_bonus');
    }
}

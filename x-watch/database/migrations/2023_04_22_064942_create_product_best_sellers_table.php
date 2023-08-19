<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBestSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_best_sellers', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("month");
            $table->timestamps();

            $table->index("product_id", "idx_product_best_sellers_product_id");
            $table->index("month", "idx_product_best_sellers_month");
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
        Schema::dropIfExists('product_best_sellers');
    }
}

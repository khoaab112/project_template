<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_promotions', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("product_variant_id");
            $table->string("product_variant_sku", 50);
            $table->integer("discount_percent");
            $table->integer("discount_amount");
            $table->integer("base_price");
            $table->integer("promotion_price");
            $table->tinyInteger("status");
            $table->tinyInteger("confirm_status");
            $table->integer("start_date");
            $table->integer("end_date");
            $table->tinyInteger("cron_status")
                ->default(0);

            $table->index("cron_status", "idx_product_promotions_cron_status");

            $table->timestamps();
            $table->index("product_id", "idx_product_promotions_product_id");
            $table->index("product_variant_id", "idx_product_promotions_product_variant_id");
            $table->index("product_variant_sku", "idx_product_promotions_product_variant_sku");
            $table->index("start_date", "idx_product_promotions_product_start_date");
            $table->index("end_date", "idx_product_promotions_product_end_date");
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
        Schema::dropIfExists('product_promotions');
    }
}

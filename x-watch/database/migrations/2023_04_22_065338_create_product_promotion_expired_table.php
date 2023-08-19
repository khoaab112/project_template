<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPromotionExpiredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_promotion_expired', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("expired_at");
            $table->tinyInteger("cron_status");
            $table->timestamps();

            $table->index("cron_status", "idx_product_promotion_expired_cron_status");
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
        Schema::dropIfExists('product_promotion_expired');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("sku", 30);
            $table->string("name", 255);
            $table->string("slug");
            $table->integer("price");
            $table->integer("compare_price");
            $table->tinyInteger("status");
            $table->string("description", 1000);
            $table->string("default_img", 250);
            $table->tinyInteger('type')->comment('1: crawl 0: normal')->default(0);
            $table->timestamps();
            $table->tinyInteger("sync_seo_content")->default(0);
            $table->index("sync_seo_content", "idx_sync_products_seo_content");
            $table->integer("promotion_price")
                ->default(0)
            ;

            $table->integer("product_promotion_id")
                ->default(0)
                ;
            $table->unique("slug");
            $table->unique("sku");
            $table->index("sku", "idx_sku");
            $table->index("slug", "idx_slug");
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
        Schema::dropIfExists('product');
    }
}

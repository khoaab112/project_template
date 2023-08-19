<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopProductInCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_product_in_category', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("category_id");
            $table->timestamps();
            $table->integer('type')->default('1');

            $table->index("product_id", "idx_top_product_in_category_product_id");
            $table->index("category_id", "idx_top_product_in_category_category_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_product_in_category');
    }
}

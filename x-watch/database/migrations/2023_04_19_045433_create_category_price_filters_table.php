<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPriceFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_price_filters', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id");
            $table->integer("from_price");
            $table->integer("to_price");
            $table->softDeletes();
            $table->index("category_id", "idx_category_price_filters_category_id");
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
        Schema::dropIfExists('category_price_filters');
    }
}

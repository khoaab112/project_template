<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFlashSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_flash_sales', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->text("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index("product_id", "idx_product_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_flash_sales');
    }
}

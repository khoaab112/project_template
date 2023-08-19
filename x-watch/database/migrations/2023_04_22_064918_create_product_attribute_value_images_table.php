<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeValueImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_value_images', function (Blueprint $table) {
            $table->id();
            $table->integer("product_attribute_value_id");
            $table->string("path", 1000);
            $table->string("file_name", 250);
            $table->timestamps();

            $table->index("product_attribute_value_id", "idx_product_attribute_value_id");
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
        Schema::dropIfExists('product_attribute_value_images');
    }
}

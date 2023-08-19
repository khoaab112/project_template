<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomerColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_customer_columns', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('product_type');
            $table->string('cloumn_name');
            $table->string('cloumn_code');
            $table->timestamps();

            $table->unique("cloumn_code");
            $table->index("product_type", "idx_product_type");
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
        Schema::dropIfExists('product_customer_columns');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCustomerActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customer_actions', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id");
            $table->text("data_json");
            $table->timestamps();
            $table->text("browser");
            $table->string('city');
            $table->string("detect");
            $table->index("order_id", "idx_order_customer_actions_order_id");
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
        Schema::dropIfExists('order_customer_actions');
    }
}

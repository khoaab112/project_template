<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistCustomerActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_customer_actions', function (Blueprint $table) {
            $table->id();
            $table->integer("wishlist_id");
            $table->text("data_json")->nullable();
            $table->timestamps();

            $table->index("wishlist_id", "idx_order_wishlist_actions");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_customer_actions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer("entity_id");
            $table->tinyInteger("entity_type");
            $table->tinyInteger("status");
            $table->string("content", 500);
            $table->timestamps();
            $table->string('user_id');
            $table->integer('rating');
            $table->index("entity_id", "idx_reviews_entity_id");
            $table->index("status", "idx_reviews_status");
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
        Schema::dropIfExists('reviews');
    }
}

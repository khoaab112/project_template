<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_contents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entity_id');
            $table->boolean('entity_type');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_des');
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
        Schema::dropIfExists('seo_contents');
    }
}

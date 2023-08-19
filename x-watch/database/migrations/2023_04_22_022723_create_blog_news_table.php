<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url', 500)->nullable();
            $table->string('path');
            $table->string('title');
            $table->text('comment');
            $table->tinyInteger('slost');
            $table->tinyInteger('status');
            $table->tinyInteger('type')->default('0')->comment('0 homepage');
            $table->timestamps();
            $table->softDeletes();
            $table->index("status", "idx_status");
            $table->index("type", "idx_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_news');
    }
}

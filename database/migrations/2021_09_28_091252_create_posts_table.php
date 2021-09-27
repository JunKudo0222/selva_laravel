<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_subcategory_id');
            $table->string('name');
            $table->string('product_content');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('product_subcategory_id')->references('id')->on('product_subcategories');

            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

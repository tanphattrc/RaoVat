<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned();
            // $table->integer('comment_id')->unsigned()->nullable();
            $table->string('title');
            // $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->default('null.png')->nullable();
            $table->double('price')->nullable();
            $table->boolean('state')->default(false);
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
        Schema::dropIfExists('posts');
    }
}

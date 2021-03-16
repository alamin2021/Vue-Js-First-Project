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
            $table->id();
            $table->unsignedBigInteger('user_id'); //changed this line
            $table->unsignedBigInteger('category_id'); //changed this line
            $table->string('title', 255)->nullable()->default('text');
            $table->string('slug', 255)->nullable()->default('text');
            $table->longText('content')->nullable()->default('text');
            $table->string('thumbnail', 255)->nullable()->default('text');
            $table->enum('status', ['draft', 'published'])->nullable()->default('draft');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('category_id')->references('id')->on('categories');
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

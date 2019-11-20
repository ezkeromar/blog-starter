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
            $table->uuid('uuid')->primary();
            $table->string('title');
            $table->string('image');
            $table->text('text');
            $table->integer('created_by');
            $table->boolean('is_published');
            $table->integer('published_by');
            $table->uuid('sector_id');
            $table->foreign('sector_id')
                    ->references('uuid')->on('categories')
                    ->onDelete('cascade');
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

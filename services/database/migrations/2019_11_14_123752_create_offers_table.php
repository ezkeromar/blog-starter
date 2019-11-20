<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('title');
            $table->text('text');
            $table->integer('created_by');
            $table->boolean('is_published');
            $table->integer('published_by');
            $table->uuid('sector_id');
            $table->foreign('sector_id')
                    ->references('uuid')->on('sectors')
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
        Schema::dropIfExists('offers');
    }
}

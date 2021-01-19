<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('media_title');
            $table->text('media_thumb')->nullable();
            $table->text('media_fullsize')->nullable();
            $table->text('media_link')->nullable();
            $table->longText('media_description')->nullable();
            $table->date('media_date')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('page_id')->nullable();
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
        Schema::dropIfExists('medias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function ($table){
            $table->foreign('page_id')->references('id')->on('pages');
        });

        Schema::table('medias', function ($table){
            $table->foreign('page_id')->references('id')->on('pages');
        });

        Schema::table('medias', function ($table){
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

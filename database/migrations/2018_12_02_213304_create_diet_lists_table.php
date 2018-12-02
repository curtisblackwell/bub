<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_lists', function (Blueprint $table) {
            $table->unsignedInteger('diet_id');
            $table->unsignedInteger('ingredient_id');

            $table
                ->foreign('diet_id')
                ->references('id')->on('diets')
                ->onDelete('cascade');
            $table
                ->foreign('ingredient_id')
                ->references('id')->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_lists');
    }
}

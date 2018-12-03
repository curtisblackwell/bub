<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_lists', function (Blueprint $table) {
            $table->unsignedInteger('ingredient_id');
            $table->unsignedInteger('recipe_id');
            $table->decimal('amount', 3, 2);
            $table->string('unit');

            $table
                ->foreign('ingredient_id')
                ->references('id')->on('ingredients')
                ->onDelete('cascade');
            $table
                ->foreign('recipe_id')
                ->references('id')->on('recipes')
                ->onDelete('cascade');

            $table->primary(['ingredient_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_lists');
    }
}

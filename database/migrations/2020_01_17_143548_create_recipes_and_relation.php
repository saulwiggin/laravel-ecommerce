<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRecipesAndRelation extends Migration
{
    public function up()
    {
        /**
         * This is the main table for a recipe
         * created dynamically by a customer on the site
         */
        Schema::create('recipes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('size');
            $table->timestamps();
        });

        /**
         * This is the "relation" table which serve to link
         * a recipe to a list of ingredients.
         * That one essentialy have reference
         * to the other tables' ids.
         * But also the quantity of each ingredients
         */
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->uuid('recipe_id')->index();
            $table->bigInteger('ingredient_id')->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
        Schema::dropIfExists('recipes');
    }
}

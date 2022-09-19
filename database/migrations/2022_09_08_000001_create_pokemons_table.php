<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('imageUrl');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('pokemon_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('pokemon_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('type')
                ->onDelete('set null');
            $table->foreign('pokemon_id')
                ->references('id')
                ->on('pokemon')
                ->onDelete('set null');
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
        Schema::table('pokemon_type', function (Blueprint $table) {
            $table->dropForeign(['pokemon_id']);
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('type');
        Schema::dropIfExists('pokemon');
        Schema::dropIfExists('pokemon_type');
    }
}

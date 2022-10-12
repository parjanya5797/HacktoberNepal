<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Primary Key of movies table
            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->string('source');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('trailer')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('year')->nullable();
            $table->string('country')->nullable();
            $table->integer("quality")->default(1);
            $table->dateTime('release_date')->nullable();
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('movies');
    }
};

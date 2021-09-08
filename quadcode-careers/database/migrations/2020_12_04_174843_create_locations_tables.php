<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTables extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->integer('position')->unsigned()->nullable();
            $table->integer('id_external')->unsigned()->nullable();
            $table->string('map_coords')->nullable();
            $table->integer('count_positions')->unsigned()->nullable();

            $table->unique('id_external');
        });

        Schema::create('location_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'location');
            $table->string('title', 200)->nullable();
            $table->string('title_prepositional', 200)->nullable();
            $table->string('country', 200)->nullable();
            $table->text('description')->nullable();
            $table->text('about_office')->nullable();
        });

        Schema::create('location_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'location');
        });

        Schema::create('location_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'location');
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_revisions');
        Schema::dropIfExists('location_translations');
        Schema::dropIfExists('location_slugs');
        Schema::dropIfExists('locations');
    }
}

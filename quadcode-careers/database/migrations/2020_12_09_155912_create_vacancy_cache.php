<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->timestamps();

            $table->boolean('show_position')->default(true);
            $table->string('position')->nullable();
            $table->boolean('show_title')->default(true);
            $table->string('title')->nullable();
            $table->boolean('show_money')->default(true);
            $table->string('money')->nullable();
            $table->string('state')->nullable();
            $table->string('created_original')->nullable();
            $table->boolean('is_hidden')->default(false);
            $table->text('body')->nullable();
            $table->boolean('show_requirements')->default(true);
            $table->text('requirements')->nullable();
            $table->text('requirements_title')->nullable();
            $table->boolean('show_conditions')->default(true);
            $table->text('conditions')->nullable();
            $table->text('conditions_title')->nullable();
            $table->string('deadline')->nullable();
            $table->smallInteger('applicants_to_hire')->default(0);

            $table->boolean('show_team')->default(true);
            $table->string('team_title')->nullable();
            $table->boolean('show_location')->default(true);
            $table->integer('location_id')->nullable();
            $table->string('location_title')->nullable();
            $table->boolean('show_category')->default(true);
            $table->integer('category_id')->nullable();
            $table->string('category_title')->nullable();
            $table->boolean('show_type_of_work')->default(true);
            $table->integer('type_of_work_id')->nullable();
            $table->string('type_of_work_title')->nullable();
            $table->boolean('show_about_team')->default(true);
            $table->text('about_team')->nullable();
            $table->boolean('show_tasks')->default(true);
            $table->text('tasks')->nullable();

            $table->jsonb('files')->nullable();

            $table->primary('id');
            $table->foreign('location_id')
                ->references('id_external')
                ->on('locations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('category_id')
                ->references('id_external')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // registro foraneo relacional
            $table->string('name');
            $table->text('description');
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
        Schema::dropIfExists('categories');
    }

     /** CREACION DE MODELO E INSERCION DE LA TABLA A LA BASE DE DATOS
    *
    *    C:\laragon\www\backend_project (master)
    *    λ php artisan make:model Category -mcr
    *    Model created successfully.
    *    Created Migration: 2021_01_27_224657_create_categories_table
    *    Controller created successfully.

    *    C:\laragon\www\backend_project (master)
    *    λ php artisan migrate:fresh
    *    Dropped all tables successfully.
    *    Migration table created successfully.
    *    Migrating: 2014_10_12_000000_create_users_table
    *    Migrated:  2014_10_12_000000_create_users_table (0.05 seconds)
    *    Migrating: 2014_10_12_100000_create_password_resets_table
    *    Migrated:  2014_10_12_100000_create_password_resets_table (0.03 seconds)
    *    Migrating: 2019_08_19_000000_create_failed_jobs_table
    *    Migrated:  2019_08_19_000000_create_failed_jobs_table (0.02 seconds)
    *    Migrating: 2021_01_26_025933_create_posts_table
    *    Migrated:  2021_01_26_025933_create_posts_table (0.02 seconds)
    *    Migrating: 2021_01_27_224657_create_categories_table
    *    Migrated:  2021_01_27_224657_create_categories_table (0.02 seconds)
     */
}



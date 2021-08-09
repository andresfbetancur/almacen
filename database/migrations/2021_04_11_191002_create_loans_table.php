<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active', ['yes', 'not']);
            $table->boolean('novedad', ['yes', 'not']);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_laptops');
            $table->unsignedBigInteger('id_instructors');
            $table->timestamps();
        });

        Schema::table('loans', function($table) {
            $table->foreign('id_laptops')->references('id')->on('laptops')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_instructors')->references('id')->on('instructors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}

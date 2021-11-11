<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('value', 255);
            $table->integer('priority');
            $table->unsignedBigInteger('carrier_service_id');
            $table->unsignedBigInteger('eshop_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('predicate_id');
            $table->timestamps();
        });


        Schema::table('rules', function($table) {
            $table->foreign('carrier_service_id')->references('id')->on('carrier_services');
            $table->foreign('eshop_id')->references('id')->on('eshops');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('predicate_id')->references('id')->on('predicates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphiccardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphiccard', function (Blueprint $table) {
            $table->string('gc_id');
            $table->string('gc_name');
            $table->string('constructor');
            $table->integer('price');
            $table->string('chipset');
            $table->string('size');
            $table->string('gcp');
            $table->boolean('6/8pin');
            $table->integer('dx11f');
            $table->integer('dx12t');
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
        Schema::dropIfExists('graphiccard');
    }
}

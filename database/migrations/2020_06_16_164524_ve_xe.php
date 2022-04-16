<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VeXe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ve_xe', function (Blueprint $table) {
            $table->increments('ma_ve');
            $table->integer('ma_xe')->unsigned();
            $table->foreign('ma_xe')->references('ma_xe')->on('xe_khach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

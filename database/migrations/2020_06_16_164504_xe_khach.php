<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class XeKhach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('xe_khach', function (Blueprint $table) {
            $table->increments('ma_xe');
            $table->integer('ma_loai')->unsigned();
            $table->integer('ma_hang')->unsigned();
            $table->integer('ma_tuyen')->unsigned();
            $table->integer('ma_lich_trinh')->unsigned();
            $table->float('gia_ve');
            $table->string('bien_so', 50);
            $table->string('anh', 100);
            $table->foreign('ma_loai')->references('ma_loai')->on('loai_xe');
            $table->foreign('ma_hang')->references('ma_hang')->on('hang_xe');
            $table->foreign('ma_tuyen')->references('ma_tuyen')->on('tuyen_duong');
            $table->foreign('ma_lich_trinh')->references('ma_lich_trinh')->on('lich_trinh');
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

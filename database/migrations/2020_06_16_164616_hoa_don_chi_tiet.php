<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HoaDonChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hoa_don_chi_tiet', function (Blueprint $table) {
            $table->integer('ma_hoa_don')->unsigned();
            $table->integer('ma_ve')->unsigned();
            $table->float('gia_ve');
            $table->date('ngay_dat');
            $table->date('ngay_khoi_hanh');
            $table->primary(['ma_hoa_don', 'ma_ve']);
            $table->foreign('ma_hoa_don')->references('ma_hoa_don')->on('hoa_don');
            $table->foreign('ma_ve')->references('ma_ve')->on('ve_xe');
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

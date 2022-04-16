<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('ma_hoa_don');
            $table->integer('ma_khach_hang')->unsigned();
            $table->float('tong_tien');
            $table->integer('tinh_trang');
            $table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khach_hang');
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

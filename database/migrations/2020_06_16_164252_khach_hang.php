<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('ma_khach_hang');
            $table->string('ten_khach_hang', 100);
            $table->string('so_dien_thoai', 50);
            $table->string('email', 100);
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

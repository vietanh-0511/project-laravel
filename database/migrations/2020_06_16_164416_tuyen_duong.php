<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TuyenDuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tuyen_duong', function (Blueprint $table) {
            $table->increments('ma_tuyen');
            $table->string('tuyen_duong', 100);
            $table->string('diem_di', 100);
            $table->string('diem_den', 100);
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

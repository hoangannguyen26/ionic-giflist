<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvPhongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cv_phongban', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tieu_de_cv');
            $table->text('noi_dung_cv');
            $table->text('chu_thich');
            $table->timestamps();
            $table->integer('ma_phong_ban', false, true);
            $table->foreign('ma_phong_ban')->references('id')->on('tbl_phongban');

            $table->integer('created_by', false, true);
            $table->integer('updated_by', false, true);
            $table->foreign('created_by')->references('id')->on('tbl_user');
            $table->foreign('updated_by')->references('id')->on('tbl_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_cv_phongban');
    }
}

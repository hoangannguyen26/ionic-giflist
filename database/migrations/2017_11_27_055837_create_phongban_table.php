<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phongban', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ten_phong_ban');
            $table->text('chu_thich');
            $table->timestamps();

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
        Schema::drop('tbl_phongban');
    }
}

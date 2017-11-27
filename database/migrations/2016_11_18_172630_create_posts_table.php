<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('content');
            $table->timestamps();
            $table->integer('township_id', false, true);
            $table->integer('created_by', false, true);
            $table->integer('updated_by', false, true);
            $table->foreign('township_id')->references('township_id')->on('tbl_townships');
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
        Schema::drop('tbl_posts');
    }
}

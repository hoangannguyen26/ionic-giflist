<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('path');
            $table->timestamps();
            $table->integer('posts_id', false, true);
            $table->foreign('posts_id')->references('id')->on('tbl_posts');

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
        Schema::drop('tbl_attachments');
    }
}

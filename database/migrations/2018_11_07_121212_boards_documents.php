<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoardsDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('boards_documents', function (Blueprint $table) {
        $table->increments('id');
        $table->bigInteger('board');
        $table->bigInteger('category');
        $table->string('title');
        $table->bigInteger('user');
        $table->longText('content');
        $table->string('password');
        $table->boolean('is_notice');
        $table->string('state');
        $table->bigInteger('count_comment');
        $table->bigInteger('count_read');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('boards_documents');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoardsComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('boards_comments', function (Blueprint $table)
      {
        $table->increments('id');
        $table->bigInteger('document');
        $table->bigInteger('parent');
        $table->bigInteger('user');
        $table->longText('content');
        $table->string('password');
        $table->string('state');
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
      Schema::dropIfExists('boards_comments');
    }
}

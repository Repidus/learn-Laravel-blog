<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Boards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('boards', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('order_by');
        $table->string('order_sort');
        $table->longText('read_group');
        $table->longText('write_group');
        $table->longText('manage_group');
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
      Schema::dropIfExists('boards');
    }
}

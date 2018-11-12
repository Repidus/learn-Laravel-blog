<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('logs', function (Blueprint $table)
      {
        $table->increments('id');
        $table->longText('message');
        $table->string('ip_address');
        $table->longText('user_agent');
        $table->timestamp('created_at')->
          default(\DB::raw('CURRENT_TIMESTAMP
          ON UPDATE CURRENT_TIMESTAMP'));
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('logs');
    }
}

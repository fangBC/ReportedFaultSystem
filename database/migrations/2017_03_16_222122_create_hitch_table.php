<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hitch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('故障类型');
            $table->text('description')->comment('故障描述');
            $table->dateTime('time')->comment('上报时间');
            $table->string('person')->comment('处理人');
            $table->string('status')->default(0)->comment('状态');
            $table->string('finish')->comment('是否已经处理完成');
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
        //
        Schema::drop('htich');
    }
}

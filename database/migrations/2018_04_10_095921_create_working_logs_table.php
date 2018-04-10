<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');
            $table->enum('status', [
                'wait','cooking', 'cooked', 'served'
                ])->default('wait');
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
        Schema::enableForeignKeyConstraints();
        Schema::table('working_logs', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['order_id']);
        });
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('working_logs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id');
            $table->foreign('menu_id')
                    ->references('id')
                    ->on('menus');
            $table->integer('amount');
            $table->enum('status', [
                'wait','cooking', 'cooked', 'served'
                ])->default('wait');
            $table->unsignedInteger('receipt_id');
            $table->foreign('receipt_id')
                    ->references('id')
                    ->on('receipts');
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
        Schema::table('orders', function(Blueprint $table){
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['receipt_id']);
        });
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('orders');
    }
}

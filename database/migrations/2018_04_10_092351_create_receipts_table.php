<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('table_id');
            $table->foreign('table_id')
                    ->references('id')
                    ->on('dining_tables');
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
        Schema::table('receipts', function(Blueprint $table){
            $table->dropForeign(['table_id']);
        });
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('receipts');
    }
}

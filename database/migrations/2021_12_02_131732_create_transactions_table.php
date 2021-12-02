<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->unsignedSmallInteger('tranctions_id');
            $table->unsignedSmallInteger('');

            $table->timestamps();
            $table->foreign('tranctions_id')->references('id')->on('tranctions_id');
            $table->foreign('costomer_id')->references('id')->on('tranctions_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

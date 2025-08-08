<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('c_id')->index()->unsigned();
            $table->foreign('c_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger('t_id')->index()->unsigned();
            $table->foreign('t_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->bigInteger('r_id')->index()->unsigned();
            $table->foreign('r_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('stock');
            $table->date('check_in');
            $table->date('check_out');
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
        Schema::dropIfExists('room_stocks');
    }
};

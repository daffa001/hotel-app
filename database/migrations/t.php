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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('c_id')->index()->unsigned();
            $table->foreign('c_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger('room_id')->index()->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->bigInteger('payments_id')->index()->unsigned();
            $table->foreign('payments_id')->references('id')->on('payments')->onDelete('cascade');
            $table->decimal('price', 65, 2);
            $table->date('check_in');
            $table->date('check_out');
            $table->string('status');
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
        Schema::dropIfExists('transactions');
    }
};

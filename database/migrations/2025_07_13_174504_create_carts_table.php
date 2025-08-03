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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('c_id')->index()->unsigned();
            $table->foreign('c_id')->references('id')->on('customers')->onDelete('cascade');

            $table->bigInteger('rooms_id')->index()->unsigned();
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('price_day',10,2);
            $table->decimal('price', 10, 2);
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
        Schema::dropIfExists('carts');
    }
};

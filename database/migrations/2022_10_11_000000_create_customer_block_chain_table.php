<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_block_chain', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('customer_id')->unique();

            $table->foreign('customer_id')
                ->references('uuid')
                ->on('customers')
                ->onDelete('cascade');

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
        Schema::dropIfExists('customer_block_chain');
    }
};

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
        Schema::create('customer_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('block_index');
            $table->string('blockchain_id');
            $table->string('hash');
            $table->string('previous_hash')->nullable();
            $table->string('hashed_data');
            $table->json('data');

            $table->foreign('blockchain_id')
                ->references('uuid')
                ->on('customer_block_chain')
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
        Schema::dropIfExists('customer_blocks');
    }
};

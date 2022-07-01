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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->enum('id_card', ['KTP', 'SIM']);
            $table->string('id_number', 20);
            $table->string('fullname');
            $table->enum('gender', ['L', 'P']);
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('phone', 13);
            $table->text('address');
            $table->string('image');
            $table->string('meet_with');
            $table->text('concern');
            $table->boolean('status')->default(true);
            $table->datetime('checkin');
            $table->datetime('checkout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->text('transaction_id');
            $table->text('payment_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });

        Schema::create('payment_course', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->text('name');
            $table->text('email');
            $table->bigInteger('phone_no');
            $table->text('hospital');
            $table->text('country');
            $table->text('intrest');
            $table->enum('type', ['participant', 'observer']);
            $table->integer('price');
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
        Schema::dropIfExists('payment');
        Schema::dropIfExists('payment_course');
    }
}

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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->bigInteger('customer_id');
            $table->enum('payment_type',['Online','Cash']);
            $table->enum('payment_status',['Paid','Cancelled','Pending','Disputed']);
            $table->double('total_amount');
            $table->double('total_discount')->default(0.00);
            $table->bigInteger('coupon_id')->nullable();
            $table->double('coupon_discount')->default(0.00);
            $table->date('booking_date');
            $table->time('booking_time');
            $table->enum('booking_status',['Pending','Confirmed','Cancelled','Denied','Complete']);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};

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
        Schema::create('vendor_bussiness_hours', function (Blueprint $table) {
            $table->id();
            $table->enum('day',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']);
            $table->time('open_time');
            $table->time('closed_time');
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
        Schema::dropIfExists('vendor_bussiness_hours');
    }
};

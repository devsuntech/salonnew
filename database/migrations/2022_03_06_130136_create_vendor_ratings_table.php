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
        Schema::create('vendor_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->bigInteger('user_id');
            $table->double('rating')->default(1.0);
            $table->double('hospitality_rating')->default(1.0);
            $table->double('services_rating')->default(1.0);
            $table->double('pricing_rating')->default(1.0);
            $table->longText('comment');
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
        Schema::dropIfExists('vendor_ratings');
    }
};

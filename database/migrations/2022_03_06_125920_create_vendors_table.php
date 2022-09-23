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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('firm_name');
            $table->bigInteger('state_id');
            $table->bigInteger('city_id');
            $table->string('pincode')->nullable();
            $table->string('firm_address');
            $table->enum('service_for',['Male','Female','Unisex']);
            $table->string('mobile',10);
            $table->string('whatsapp_number',10);
            $table->string('gst_number');
            $table->string('gst_file');
            $table->string('tag_line')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('about_firm');
            $table->longText('amenities')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->bigInteger('position')->nullable();
            $table->longText('payment_methods')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};

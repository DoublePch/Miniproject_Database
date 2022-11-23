<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('idname');
            $table->string('sex');
            $table->string('age');
            $table->string('phone');
            $table->string('address');
            $table->string('role')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_id');
            $table->string('car_price');
            $table->string('car_image');
            $table->string('car_type');
            $table->string('car_brand');
            $table->string('car_status')->default(0);
            $table->timestamps();
        });

        Schema::create('bookingcars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->String('car_brand');
            $table->String('idname');
            $table->String('fname');
            $table->String('lname');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('bookingcars');
    }
}

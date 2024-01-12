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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name')->nullable();
            $table->string('username')->nullable(); // Username
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->date('birthday')->nullable(); // Ngày sinh
            $table->string('phone')->nullable(); // Số điện thoại
            $table->string('gender')->nullable(); // Giới tính
            $table->string('avatar', 2000)->default('user-default.png'); // Ảnh đại diện
            
            $table->string('city')->nullable(); // Tỉnh / Thành
            $table->string('district')->nullable(); // Quận / Huyện/ Thành phố
            $table->string('ward')->nullable(); // Phường / Xã / Thị trấn
            $table->text('address')->nullable(); // Địa chỉ chi tiết

            $table->string('role')->nullable(); // Quyền
            $table->integer('order')->nullable(); // Thứ tự
            $table->tinyInteger('status')->nullable(); // Trạng thái
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
        Schema::dropIfExists('users');
    }
};

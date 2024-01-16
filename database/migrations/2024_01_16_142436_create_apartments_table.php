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
        Schema::create('apartments', function (Blueprint $table) { // Căn hộ
            $table->uuid('id');
            $table->uuid('list_id')->nullable(); // ID danh mục căn hộ (Hotel, Villa, ...)
            $table->string('code')->nullable(); // Mã căn hộ
            $table->string('name')->nullable(); // Tên căn hộ
            $table->string('slug')->nullable(); // Đường dẫn
            $table->string('images')->nullable(); // Ảnh đại diện
            $table->string('city')->nullable(); // Tỉnh/Thành
            $table->string('district')->nullable(); // Quận/Huyện
            $table->string('ward')->nullable(); // Phường/Xã/Thị trấn
            $table->text('address')->nullable(); // Địa chỉ chi tiết
            $table->text('content')->nullable(); // Chi tiết
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
        Schema::dropIfExists('apartments');
    }
};

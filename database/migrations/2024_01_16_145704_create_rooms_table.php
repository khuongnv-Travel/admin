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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('home_id')->nullable(); // ID Căn hộ
            $table->string('code')->nullable(); // Mã Phòng
            $table->string('name')->nullable(); // Tên Phòng
            $table->string('slug')->nullable(); // Đường dẫn
            $table->string('images')->nullable(); // Ảnh đại diện
            $table->string('type')->nullable(); // Loại phòng
            $table->string('quantity')->nullable(); // Số lượng phòng
            $table->string('people')->nullable(); // Số lượng người
            $table->string('price')->nullable(); // Giá gốc
            $table->string('sale')->nullable(); // Giá giảm
            $table->string('VAT')->nullable(); // VAT
            $table->string('data_json')->nullable(); // Thông tin thêm
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
        Schema::dropIfExists('rooms');
    }
};

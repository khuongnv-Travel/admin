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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('listtype_id'); // Loại hình xe (Taxi, 7 chỗ, 29 chỗ, ...);
            $table->string('code')->nullable(); // Mã xe
            $table->string('name')->nullable(); // Tên xe
            $table->string('images')->nullable(); // Ảnh xe
            $table->text('note')->nullable(); // Ghi chú
            $table->integer('order')->nullable(); // Số thứ tự
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
        Schema::dropIfExists('cars');
    }
};

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
        Schema::create('images_list', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('record_id')->nullable(); // ID bản ghi
            $table->string('file_name')->nullable(); // Tên file
            $table->string('file_url')->nullable(); // Đường dẫn
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
        Schema::dropIfExists('images_list');
    }
};

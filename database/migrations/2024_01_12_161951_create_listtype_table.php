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
        Schema::create('listtype', function (Blueprint $table) {
            $table->uuid('id'); // ID
            $table->string('code')->nullable(); // Mã
            $table->string('name')->nullable(); // Tên
            $table->text('note')->nullable(); // Mô tả
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
        Schema::dropIfExists('listtype');
    }
};

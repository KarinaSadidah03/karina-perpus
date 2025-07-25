<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karina_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover_image')->nullable(); // biar bisa kosong
            $table->string('file_pdf')->nullable();    // bisa kosong juga
            $table->unsignedBigInteger('category_id');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('karina_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karina_books');
    }
};
